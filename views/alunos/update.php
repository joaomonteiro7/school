<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\aluno $model */

$this->title = 'Update Aluno: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Alunos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="aluno-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'turmas' => $turmas
    ]) ?>

</div>
