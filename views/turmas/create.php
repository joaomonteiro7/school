<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\turma $model */

$this->title = 'Create Turma';
$this->params['breadcrumbs'][] = ['label' => 'Turmas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="turma-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
