<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\SmsResponseSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="sms-response-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'error_code') ?>

    <?= $form->field($model, 'error_message') ?>

    <?= $form->field($model, 'jobid') ?>

    <?= $form->field($model, 'number') ?>

    <?php // echo $form->field($model, 'msg_id') ?>

    <?php // echo $form->field($model, 'part_id') ?>

    <?php // echo $form->field($model, 'message') ?>

    <?php // echo $form->field($model, 'send_on') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
