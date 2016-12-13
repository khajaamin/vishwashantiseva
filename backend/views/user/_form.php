<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model common\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4>Update User </h4>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-12">
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
                    <!-- <?php //Html::submitButton('Signup', ['class' => 'btn btn-primary btn_1', 'name' => 'signup-button']) ?> -->
                    <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                </div>
         <?php ActiveForm::end(); ?>                        
                    </div>
                </div>                
            </div>
        </div>

             

</div>
