<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;

$this->title = 'Signup/Register';

?>
<div class="grid_3">
  <div class="container">
   <div class="breadcrumb1">
     <ul>
        <a href="<?php echo Url::toRoute('site/index');?>"><i class="fa fa-home home_1"></i></a>
        <span class="divider">&nbsp;|&nbsp;</span>
        <li class="current-page"><?= Html::encode($this->title) ?></li>
     </ul>
   </div>
   <div class="services">
      <div class="col-sm-6 login_left">
         <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>
            
                <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>
                <?php 
                $dataCategory=ArrayHelper::map(\common\models\Masters::find()->where(['type'=>'profile_for'])->asArray()->all(), 'name', 'name');


                 echo  $form->field($model, 'profile_for')->dropDownList($dataCategory,['prompt'=>'Profile For']) ?>

                <?php
                $motherTongue=ArrayHelper::map(\common\models\Masters::find()->where(['type'=>'mother_tongue'])->asArray()->all(), 'name', 'name');

                echo $form->field($model, 'mother_tongue')->dropDownList($motherTongue ,['prompt'=>'Mother Tongue']) ?> 
                
                <?= $form->field($model, 'email') ?>

                <?= $form->field($model, 'password')->passwordInput() ?>

                <div class="form-group">
                    <?= Html::submitButton('Signup', ['class' => 'btn btn-primary btn_1', 'name' => 'signup-button']) ?>
                </div>
         <?php ActiveForm::end(); ?>
      </div>
      <div class="clearfix"> </div>
   </div>
  </div>
</div>

