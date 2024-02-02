<?php

namespace app\controllers;

use Yii;
use app\models\Aluno;
use app\presencaSearch;
use yii\web\Controller;
use app\models\presenca;
use yii\filters\VerbFilter;
use yii\web\NotFoundHttpException;

/**
 * PresencasController implements the CRUD actions for presenca model.
 */
class PresencasController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all presenca models.
     *
     * @return string
     */
    public function actionIndex($turmaId)
    {
        // Lógica para obter os alunos da turma e os dias do mês
        // Substitua isso com suas próprias consultas ao banco de dados
        $alunos = Aluno::find()->where(['turmaId' => $turmaId])->all();
        $diasDoMes = range(1, date('t'));

        return $this->render('index', [
            'alunos' => $alunos,
            'diasDoMes' => $diasDoMes,
        ]);
    }

    /**
     * Displays a single presenca model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new presenca model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate($alunoId)
    {
        // Verifica se já existe uma presença hoje para o aluno
        $presencaExistente = Presenca::findOne(['alunoId' => $alunoId, 'data' => date('Y-m-d')]);
        if ($presencaExistente) {
            // Já existe uma presença para o aluno hoje
            Yii::$app->session->setFlash('error', 'Presença já registrada para hoje.');
        } else {
            // Cria uma nova presença
            $model = new Presenca();
            $model->alunoId = $alunoId;
            $model->data = date('Y-m-d'); // ou apenas $dataAtual se a hora não for necessária
            $model->save();

            Yii::$app->session->setFlash('success', 'Presença registrada com sucesso.');
        }
        $aluno = Aluno::findOne(['id' => $alunoId]);
        return $this->redirect(['presencas/index', 'turmaId' => $aluno->turmaId]);
    }

    /**
     * Updates an existing presenca model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing presenca model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the presenca model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return presenca the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = presenca::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
