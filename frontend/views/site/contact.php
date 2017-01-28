<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\ContactForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;
use yii\helpers\Url;

$this->title =  \Yii::t('app','Contact Details');
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
      <address class="addr row">
        <dl class="grid_4">
            <dt><?=\Yii::t('app','Address');?> :</dt>
            <dd>
                Survey No 218, Plot No 34,
    Subhash Nagar, Vitthal Nagar,
    Near Zilla Parishad School,
    Hadapsar. Pune: 411 028
            </dd>
        </dl>
        <dl class="grid_4">
            <dt><?=\Yii::t('app','Phone Number');?> :</dt>
            <dd>
                +91-9890842895 
            </dd>
        </dl>
        <dl class="grid_4">
            <dt><?=\Yii::t('app','Email');?>  :</dt>
            <dd><a href="malito:admin@vishwashantiseva.com">admin@vishwashantiseva.com</a></dd>
        </dl>
      </address>
      <address class="addr row">
        <dl class="grid_4">
          <dt><?=\Yii::t('app','Sanstha Registration No.');?> : </dt>
          <dd>
            Reg. No. 12318 / 1996        
          </dd>
        </dl>
        <dl class="grid_4">
          <dt><?=\Yii::t('app','Account Details');?> : </dt>
          <dd>
                Vishwa Shanti Yuva va Mahila Sanstha
                Saving Account No: 50064202626
                Branch : Manjri
                IFSC: ALLA0210679         
          </dd>
        </dl>
      </address>
    </div>
   </div>
</div>
<div class="about_middle">
  <div class="container">
    <h2>Contact Form</h2>
      <?php $form=ActiveForm::begin(['id'=>'contact-form']);?>

      <?= $form->field($model,'name')->textInput(['autofocus'=>true])?>

      <?= $form->field($model,'email')?>

      <?= $form->field($model,'subject')?>

      <?= $form->field($model,'body')->textarea(['rows'=>6])?>      

      <?= $form->field($model,'verifyCode')->widget(Captcha::className(),['template'=>'<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-9">{input}</div></div>'])?>
      <div class="form-group">
        <?= Html::submitButton('Submit',['type'=>'submit','class'=>'btn btn-primary','name'=>'contact-button','id'=>'submit'])?>
      </div>
      <?php $form=ActiveForm::end()?>    
  </div>
  
</div>

<!-- <div class="map">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d242117.68137786316!2d73.72253592206822!3d18.52489016775948!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bc2bf2e67461101%3A0x828d43bf9d9ee343!2sPune%2C+Maharashtra!5e0!3m2!1sen!2sin!4v1481168060093"></iframe>
</div> -->
