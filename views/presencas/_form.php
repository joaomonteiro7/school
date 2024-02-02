<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\presenca $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="presenca-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'alunoId')->textInput() ?>

    <?= $form->field($model, 'data')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
