<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\datetime\DateTimePicker;
use common\models\Helper
//use dosamigos\datetimepicker\DateTimePicker;

/* @var $this yii\web\View */
/* @var $model common\models\PaidProfiles */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="paid-profiles-form">

<div class="panel panel-default">
    <div class="panel-heading">
        <h3>Create Paid Profiles</h3>    
    </div>
    <div class="panel-body">
            <?php $form = ActiveForm::begin(); ?>



            <?= $form->field($model, 'paid_for_profile_id')->textInput(['maxlength' => true]) ?>

            <!-- <?php// $form->field($model, '')->textInput() ?> -->
            <!-- <?php //$form->field($model, 'date')->widget(\yii\jui\DatePicker::classname(), [
                        //'clientOptions' => ['minDate' => '0'],
                        //'minDate' => 0,
                        //'dateFormat' => 'yyyy-MM-dd',
                        //'options'=>['class'=>'form-control'],
                        //])
                         ?> -->

                       


            <?= $form->field($model, 'status')->dropDownList(Helper::getSuccessFailureStatus(),['prompt'=>'select status']) ?>
            

            <div class="form-group">
                <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
            </div>

            <?php ActiveForm::end(); ?>
    </div>
    
</div>
    

</div>
