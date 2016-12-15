<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\jui\DatePicker;

/* @var $this yii\web\View */
/* @var $model common\models\Education */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="education-form">
    <div class="panel panel-default">
            <div class="panel-heading">
                <h4> Education </h4>
            </div>
            <div class="panel-body">
                <?php $form = ActiveForm::begin(); ?>
                <div class="row">
                    <div class="col-md-6">
                         

                       

                        <?= $form->field($model, 'education_area')->textInput(['maxlength' => true]) ?>
                    </div>
                    <div class="col-md-6">    

                        <?= $form->field($model, 'education')->textInput(['maxlength' => true]) ?>
                    </div> 
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <?= $form->field($model, 'start_date')->widget(\yii\jui\DatePicker::classname(), [
                        //'language' => 'ru',
                        'dateFormat' => 'yyyy-MM-dd',
                        'options'=>['class'=>'form-control'],
                        ]) ?>    
                    </div>
                
                    <div class="col-md-6">
                        <?= $form->field($model, 'end_date')->widget(\yii\jui\DatePicker::classname(), [
                        //'language' => 'ru',
                            //'startDate'=> 'today',
                            
                            //'minDate'=> new Date(), 
                        'dateFormat' => 'yyyy-MM-dd',
                        'options'=>['class'=>'form-control'],
                        ]) ?>    
                    </div>
                </div>    
                        

                <div class="row">      
                    <div class="col-md-6">    

                        <?= $form->field($model, 'institute')->textInput(['maxlength' => true]) ?>
                    </div>
                    <div class="col-md-6">    

                        <?= $form->field($model, 'result')->textInput(['maxlength' => true]) ?>
                    </div> 
                </div>
                <div class="row">      
                    <div class="col-md-12">           

                        <?= $form->field($model, 'place')->textInput(['maxlength' => true]) ?>

                        <div class="form-group">
                            <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                        </div>

                                                
                    </div>
                </div>
            <?php ActiveForm::end(); ?>    
            </div>
    </div>

    

</div>
