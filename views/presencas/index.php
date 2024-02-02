<?php

use app\models\presenca;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\presencaSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Presencas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="presenca-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Presenca', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); 
    ?>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Aluno</th>
                <?php foreach ($diasDoMes as $dia) : ?>
                    <th><?= $dia ?></th>
                <?php endforeach; ?>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($alunos as $aluno) : ?>
                <tr>
                    <td><?= $aluno->nome ?></td>
                    <?php foreach ($diasDoMes as $dia) : ?>
                        <td>
                            <?php
                            $data = new DateTime();
                            $data->setDate(date('Y'), date('n'), $dia); // Configura a data com o ano e mês atual, e o dia do loop

                            // Verifica se o dia do loop é igual ao dia atual
                            $diaAtual = (int) date('j');
                            $mesAtual = (int) date('n');
                            $anoAtual = (int) date('Y');

                            if ($dia == $diaAtual && $data->format('n') == $mesAtual && $data->format('Y') == $anoAtual) {
                                $presencaExistente = Presenca::findOne([
                                    'alunoId' => $aluno->id,
                                    'data' => $data->format('Y-m-d')
                                ]);

                                if ($presencaExistente) {
                                    echo 'p';
                                } else {
                                    echo Html::a('p', ['presencas/create', 'alunoId' => $aluno->id], ['class' => 'btn btn-success']);
                                }
                            } else {
                                // Não é o dia atual, não mostra o botão
                                echo '-';
                            }
                            ?>
                        </td>
                    <?php endforeach; ?>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>


</div>