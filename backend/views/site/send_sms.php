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


                    <?= $form->field($model, 'msisdn')->textInput(['autofocus' => true]) ?>

                    <?= $form->field($model, 'msg')->textarea(['rows' => 3]) ?>

                    <div class="form-group">
                        <?= Html::submitButton('Login', ['class' => 'btn btn-success btn-block btn-lg', 'name' => 'login-button']) ?>
                    </div>

            <?php ActiveForm::end(); ?>

        </div>

</div>
