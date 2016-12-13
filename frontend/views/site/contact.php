<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\ContactForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;
use yii\helpers\Url;

$this->title = 'Contact';
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
   <div class="grid_5">
      <p>Praesent vestibulum molestie lacus. Aenean nonummy hendrerit mauris. Phasellus porta. Fusce suscipit varius mi. Cum sociis natoque penatibus et magnis dis parturient. montes, nascetur ridiculus mus. Nulla dui. Fusce feugiat malesuada odio. Morbi nunc odio, gravida at, cursus nec, luctus a, lorem. Maecenas tristique orci ac sem. Duis ultricies pharetra magna. Donec accumsan malesuada orci. Donec sit amet eros. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Mauris fermentum dictum magna. Sed laoreet aliquam leo. Ut tellus dolor, dapibus eget, elementum vel, cursus eleifend, elit.</p>
      <address class="addr row">
        <dl class="grid_4">
            <dt>Address :</dt>
            <dd>
                8901 Nulla Pariatur, <br>
                Ipsum, D05 87GR.
            </dd>
        </dl>
        <dl class="grid_4">
            <dt>Telephones :</dt>
            <dd>
                +1 800 245 4578 <br>
                +1 800 789 5478
            </dd>
        </dl>
        <dl class="grid_4">
            <dt>E-mail :</dt>
            <dd><a href="malito:mail@demolink.org">mail(at)Marital.com</a></dd>
        </dl>
      </address>
    </div>
   </div>
</div>
<div class="about_middle">
  <div class="container">
     <h2>Contact Form</h2>
            <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>

                <?= $form->field($model, 'name')->textInput(['autofocus' => true]) ?>

                <?= $form->field($model, 'email') ?>

                <?= $form->field($model, 'subject') ?>

                <?= $form->field($model, 'body')->textarea(['rows' => 6]) ?>

                <?= $form->field($model, 'verifyCode')->widget(Captcha::className(), [
                    'template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-9">{input}</div></div>',
                ]) ?>

                <div class="form-group">
                    <?= Html::submitButton('Submit', ['type'=>'submit', 'class' => 'btn btn-primary', 'name' => 'contact-button' ,'id'=>'submit']) ?>
                </div>

            <?php ActiveForm::end(); ?>
  </div>
</div>
<div class="map">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d242117.68137786316!2d73.72253592206822!3d18.52489016775948!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bc2bf2e67461101%3A0x828d43bf9d9ee343!2sPune%2C+Maharashtra!5e0!3m2!1sen!2sin!4v1481168060093"></iframe>
</div>
