<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\ContactForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;
use yii\helpers\Url;

$this->title = 'Send SMS';


$this->registerJs(
    '$("document").ready(function(){
       $("#sms-form").submit(function(e){
          var url =  "http://sms.vndsms.com/vendorsms/pushsms.aspx?user=vishwa&password=vishwa&sid=WEBSMS&fl=0&gwid=2&"+$( this ).serialize();
            $.get(url).success(function(data){
                console.log(data);
                location.reload(); 
            }).error(function(error){
                console.log(error);
                location.reload(); 
            });
             e.preventDefault();
        });

     });'
);

?>


    <h2>Send Sms Form</h2>
    <div class="col-md-4">
        <?php $form = ActiveForm::begin(['id' => 'sms-form']); ?>
            <?= $form->field($model, 'to')->textInput(['autofocus' => true,'name'=>'msisdn']) ?>
            <?= $form->field($model, 'message')->textarea(['rows' => 6,'name'=>'msg']); ?>
            <div class="form-group">
                <?= Html::submitButton('Submit', ['type'=>'submit', 'class' => 'btn btn-primary', 'name' => 'contact-button' ,'id'=>'submit']) ?>
            </div>
        <?php ActiveForm::end(); ?>
        </div>

</div>

