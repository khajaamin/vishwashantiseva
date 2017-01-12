<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\SiteSetting */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="site-setting-form">


    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col-md-12">
            <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>        
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'contact_no')->textInput() ?>        
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'salt')->textInput(['maxlength' => true]) ?>        
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'merchant_key')->textInput(['maxlength' => true]) ?>        
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'payment_url')->textarea(['rows' => 6]) ?>        
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'smsurl')->textarea(['rows' => 6]) ?>        
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
              <?= $form->field($model, 'price_control')->textInput() ?>  
        </div>
    </div>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
