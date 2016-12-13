<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model common\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form">

             <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>
            
                <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>
                <?php
                 $profileFor=ArrayHelper::map(\common\models\Masters::find()->where(['type'=>'profile_for'])->asArray()->all(),'name','name');
                echo $form->field($model, 'profile_for')->dropDownList($profileFor, ['prompt' => 'select profile for']);    
                ?>

                <?php
                 $motherTongue=ArrayHelper::map(\common\models\Masters::find()->where(['type'=>'mother_tongue'])->asArray()->all(),'name','name');
                echo $form->field($model, 'mother_tongue')->dropDownList($motherTongue, ['prompt' => 'select mother tongue']);    
                ?>

                <?= $form->field($model, 'email') ?>
                <?= $form->field($model, 'password_hash')->passwordInput() ?>
              

                <div class="form-group">
                    <?= Html::submitButton('Signup', ['class' => 'btn btn-primary btn_1', 'name' => 'signup-button']) ?>
                </div>
         <?php ActiveForm::end(); ?>

</div>
