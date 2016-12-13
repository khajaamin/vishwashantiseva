<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\PasswordResetRequestForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;

$this->title = 'Request password reset';

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
        <div class="row">
            <div class="col-lg-5">
                <?php $form = ActiveForm::begin(['id' => 'request-password-reset-form']); ?>

                    <?= $form->field($model, 'email')->textInput(['autofocus' => true]) ?>

                    <div class="form-group">
                        <?= Html::submitButton('Send', ['class' => 'btn btn-primary btn_1']) ?>
                    </div>

                <?php ActiveForm::end(); ?>
            </div>
        </div>
   </div>

</div>
</div>
