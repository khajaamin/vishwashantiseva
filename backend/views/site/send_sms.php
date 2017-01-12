<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\ContactForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;


$this->title = 'Send SMS';

?>
    <h2>Send Sms Form</h2>
    <div id="result"></div>
    <div class="col-md-4">
            <?php $form = ActiveForm::begin(); ?>
                    
                <?php
            //         $motherTongue=ArrayHelper::map(\common\models\Events::find()->where(['status'=>1])->asArray()->all(), 'id', 'name');

            //     echo $form->field($model, 'event')->dropDownList($motherTongue ,
            //         [
            //             'prompt'=>'-Event Select-',
            //             'onchange'=>'
            //     $.get( "'.Yii::$app->urlManager->createUrl('site/messages').'",
            //     { id: $(this).val() }).done(function( data ) {
            //                     $( "#sms-msg" ).html( data );
            //                 }
            //             );
            // ' 


            //         ]) ?> 

                    <?= $form->field($model, 'msisdn')->textInput(['autofocus' => true]) ?>

                    <?= $form->field($model, 'msg')->textarea(['rows' => 3]) ?>

                    <div class="form-group">
                        <?= Html::submitButton('Login', ['class' => 'btn btn-success btn-block btn-lg', 'name' => 'login-button']) ?>
                    </div>

            <?php ActiveForm::end(); ?>
<!--              <form method="post">
                <div class="form-group">

                  <input class="form-control" type="text" name="msisdn" id="msisdn">
                </div>
                <div class="form-group">
                    <textarea class="form-control" name="msg" id="msg"></textarea>    
                </div>     

                <div class="form-group">
                    <?php // Html::submitButton('send sms', ['class' => 'btn btn-success btn-block btn-lg', 'name' => 'sendsms']) ?>
                </div>
              </form> -->
        </div>

</div>
