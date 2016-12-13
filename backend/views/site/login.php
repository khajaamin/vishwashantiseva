<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';

?>    
 <div class="container">
     <div class="row">
        <div class="col-md-offset-4 col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                   <?= Html::encode($this->title) ?>
                </div>
                <div class="panel-body">
                    
                            <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
                                <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

                                <?= $form->field($model, 'password')->passwordInput() ?>

                                <?= $form->field($model, 'rememberMe')->checkbox() ?>

                                <div class="form-group">
                                    <?= Html::submitButton('Login', ['class' => 'btn btn-success btn-block btn-lg', 'name' => 'login-button']) ?>
                                </div>

                            <?php ActiveForm::end(); ?>
                               
                </div>
                    
            </div>    
        </div>      
    </div>
    
</div>
   
