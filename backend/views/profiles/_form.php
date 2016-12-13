<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model common\models\Profiles */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="profiles-form">

    <?php $form = ActiveForm::begin(); ?>

   <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'profile_image')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'date_of_birth')->textInput(['maxlength' => true]) ?>

    <?php
        $maritalStatus=ArrayHelper::map(\common\models\Masters::find()->where(['type'=>'marital_status'])->asArray()->all(),'name','name');
        echo $form->field($model, 'marital_status')->dropDownList($maritalStatus, ['prompt' => 'select marital status']);    
         ?>

    <?= $form->field($model, 'gender')->dropDownList([ 'm' => 'Male', 'f' => 'Female', ], ['prompt' => 'select gender']) ?>

    <?= $form->field($model, 'country')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'state')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'city')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mobile')->textInput() ?>

    <?= $form->field($model, 'height')->textInput() ?>

    <?php
        $bloodGroup=ArrayHelper::map(\common\models\Masters::find()->where(['type'=>'blood_group'])->asArray()->all(),'name','name');
        echo $form->field($model, 'blood_group')->dropDownList($bloodGroup, ['prompt' => 'select blood group']);    
    ?>

    <?= $form->field($model, 'complextion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'built')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'religion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'caste')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sub_caste')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'diet')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'birthplace')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'birthtime')->textInput() ?>

    <?= $form->field($model, 'rashi')->textInput(['maxlength' => true]) ?>

    <?php
        $nakshtra=ArrayHelper::map(\common\models\Masters::find()->where(['type'=>'nakshatra'])->asArray()->all(),'name','name');
        echo $form->field($model, 'nakshatra')->dropDownList($nakshtra, ['prompt' => 'select nakshatra']);    
    ?>

    <?= $form->field($model, 'charan')->textInput() ?>

    <?= $form->field($model, 'nadi')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'gan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'gotra')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'education')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'occupation')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'income')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'father')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mother')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'brothers')->textInput() ?>

    <?= $form->field($model, 'sisters')->textInput() ?>

    <?= $form->field($model, 'expected_caste')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'expected_min_age')->textInput() ?>

    <?= $form->field($model, 'expected_max_age')->textInput() ?>

    <?= $form->field($model, 'expected_min_height')->textInput() ?>

    <?= $form->field($model, 'expected_max_height')->textInput() ?>

    <?= $form->field($model, 'expected_education')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'expected_occupation')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
