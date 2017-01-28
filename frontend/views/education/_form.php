<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use bootui\datepicker\Datepicker;
 
/* @var $this yii\web\View */
/* @var $model common\models\Education */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="education-form">

    <?php $form = ActiveForm::begin(); ?>
<div class="row">
    <div class="col-md-offset-3 col-md-6 bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
       <div id="myTabContent" class="tab-content">
            <div role="tabpanel" class="tab-pane fade in active" id="home" aria-labelledby="home-tab">
                <div class="basic_1">
                    <div class="basic_1-left">
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
                                    <?= $form->field($model,'start_date')->widget(yii\jui\DatePicker::className(),[  'dateFormat' => 'yyyy-MM-dd',
                                                        'clientOptions' => [
                                                           
                                                            'changeYear'=>true,
                                                            'changeMonth'=>true,
                                                            'yearRange'=>'-40y:c+nn',
                                                            'maxDate'=>'-1d'
                                                        ],
                                                        'options' => ['class' => 'form-control']
                                                    ]) 
                                    ?>

                                </div>
                                <div class="col-md-6">
                                    <?= $form->field($model,'end_date')->widget(yii\jui\DatePicker::className(),[ 'dateFormat' => 'yyyy-MM-dd',
                                        'clientOptions' => [
                                                            
                                                            'changeYear'=>true,
                                                            'changeMonth'=>true,
                                                            'yearRange'=>'-40y:c+nn',
                                                            'maxDate'=>'-1d'
                                                        ],
                                                        'options' => ['class' => 'form-control']
                                                    ]) 
                                    ?>                                    
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <?= $form->field($model, 'result')->textInput(['maxlength' => true]) ?>        
                                </div>
                                <div class="col-md-6">
                                    <?= $form->field($model, 'place')->textInput(['maxlength' => true]) ?>        
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <?= $form->field($model, 'institute')->textInput(['maxlength' => true]) ?>           
                                </div>
                            </div>
                            <div class="form-group">
                                <?= Html::submitButton($model->isNewRecord ? \Yii::t('app','Create') : \Yii::t('app','Update'), ['class' => $model->isNewRecord ? 'btn btn-success btn_1' : 'btn btn-primary btn_1']) ?>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    <?php ActiveForm::end(); ?>

</div>
