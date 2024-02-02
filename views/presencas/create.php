<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\presenca $model */

$this->title = 'Create Presenca';
$this->params['breadcrumbs'][] = ['label' => 'Presencas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="presenca-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
