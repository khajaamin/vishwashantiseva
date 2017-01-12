<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\SmsResponse */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="sms-response-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'error_code')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'error_message')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'jobid')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'number')->textInput() ?>

    <?= $form->field($model, 'msg_id')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'part_id')->textInput() ?>

    <?= $form->field($model, 'message')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'send_on')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
