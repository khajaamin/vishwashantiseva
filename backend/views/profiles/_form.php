<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\jui\DatePicker;
use janisto\timepicker\TimePicker;


?>


<div class="profiles-form">

<div class="panel panel-default">
    <div class="panel-heading">
        <h3> Profile </h3>
    </div>
    <div class="panel-body">
        <?php $form = ActiveForm::begin(); ?>
        <div class="row">
            <div class="col-md-6">

                <div class="row">
                    <div class=" col-md-12">
                         <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

                         <?= $form->field($model, 'profile_image')->fileInput() ?>

                         <?= $form->field($model, 'date_of_birth')->widget(\yii\jui\DatePicker::classname(), [ 'dateFormat' => 'yyyy-MM-dd',

                                'clientOptions' => [
                                    
                                    'changeYear'=>true,
                                    'changeMonth'=>true,
                                    'yearRange'=>'-70y:c+nn',
                                    'maxDate'=>'-1d'
                                ],
                                'options' => ['class' => 'form-control']
                            ]) ?>    
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <?php
                        $maritalStatus=ArrayHelper::map(\common\models\Masters::find()->where(['type'=>'marital_status'])->asArray()->all(),'name','name');
                        echo $form->field($model, 'marital_status')->dropDownList($maritalStatus, ['prompt' => 'select marital status']);    
                         ?>
                    </div>
                    <div class="col-md-6">
                        <?= $form->field($model, 'gender')->dropDownList([ 'm' => 'Male', 'f' => 'Female', ], ['prompt' => 'select gender']) ?>                      
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <?= $form->field($model, 'country')->textInput(['maxlength' => true]) ?>                       
                    </div>
                    <div class="col-md-4">
                        <?= $form->field($model, 'state')->textInput(['maxlength' => true]) ?>                                             
                    </div>
                    <div class="col-md-4">
                        <?= $form->field($model, 'city')->textInput(['maxlength' => true]) ?>                                             
                    </div>
                </div>
                <div class="row">
                            <div class="col-md-12">
                                <?= $form->field($model, 'permanant_address')->textarea(['rows' => 2])?>
                            </div>
               </div>

                <div class="row">
                    <div class=" col-md-12">
                        <?= $form->field($model, 'mobile')->textInput() ?>                      
                    </div>
                </div>

                <div class="row">
                    <div class=" col-md-4">
                        <?= $form->field($model, 'height')->textInput() ?>                      
                    </div>
                    <div class=" col-md-4">
                          <?= $form->field($model, 'weight')->textInput() ?>
                    </div>
                    <div class=" col-md-4">
                        <?php
                        $bloodGroup=ArrayHelper::map(\common\models\Masters::find()->where(['type'=>'blood_group'])->asArray()->all(),'name','name');
                        echo $form->field($model, 'blood_group')->dropDownList($bloodGroup, ['prompt' => 'select blood group']);    
                        ?>                    
                    </div>
                </div>

                <div class="row">
                    <div class=" col-md-6">
                      <?= $form->field($model, 'complextion')->textInput(['maxlength' => true]) ?>                      
                    </div>
                    <div class=" col-md-6">
                        <?= $form->field($model, 'built')->textInput(['maxlength' => true]) ?>
                    </div>
                </div>

                <div class="row">
                    <div class=" col-md-4">
                        <?= $form->field($model, 'religion')->textInput(['maxlength' => true]) ?>                                              
                    </div>
                    <div class=" col-md-4">
                        <?php //echo $form->field($model, 'caste')->textInput(['maxlength' => true]) ?>
                        <?php 
                                $data = ArrayHelper::map(\common\models\Masters::find()->where(['parent_id'=>0,'type'=>'caste'])->asArray()->all(),'id','name');
                            ?>
                            <?php echo $form->field($model, 'caste')->dropDownList($data,
                            ['prompt'=>'Select Caste',

                            'onchange'=>'
                                $.get({url:"'.Yii::$app->urlManager->createUrl('profiles/subcaste') . '",data:{id:$(this).val()}, 
                                success:function( data ) {
                                    $( "select#profiles-sub_caste" ).html( data );
                                }});',

                           ]);?>
                      
                    </div>
                    <div class=" col-md-4">
                        <?php //echo $form->field($model, 'sub_caste')->textInput(['maxlength' => true]) ?>
                        <?php
                                    $data = ArrayHelper::map(\common\models\Masters::find()->where(['!=','parent_id',0])->asArray()->all(),'id','name');
                                // $form->field($model, 'sub_caste')->textInput(['maxlength' => true])
                                ?>
                                <?php 
                                        echo $form->field($model, 'sub_caste')->dropDownList($data,
                                ['prompt'=>'Select Sub Caste']);
                           ?>                   
                    </div>
                </div>

                <div class="row">
                    <div class=" col-md-12">
                        <?= $form->field($model, 'diet')->textInput(['maxlength' => true]) ?>                
                    </div>
                </div>

                <div class="row">
                    <div class=" col-md-6">
                        <?= $form->field($model, 'birthplace')->textInput(['maxlength' => true]) ?>                                                             
                    </div>
                    <div class=" col-md-6">
                        
                         <?php echo $form->field($model, 'birthtime')->widget(\janisto\timepicker\TimePicker::className(), [
                            //'language' => 'fi',
                            'mode' => 'time',
                            'clientOptions'=>[
                                //'dateFormat' => 'yy-mm-dd',
                                'timeFormat' => 'HH:mm:ss',
                                'showSecond' => true,
                            ]
                        ]);
                       ?>                  
                    </div>
                    
                </div>
                

            </div>
            <div class="col-md-6">
                <div class="row">
                    <div class=" col-md-6">
                      <?= $form->field($model, 'rashi')->textInput(['maxlength' => true]) ?>                                                             
                    </div>
                    <div class=" col-md-6">
                        <?php
                            $nakshtra=ArrayHelper::map(\common\models\Masters::find()->where(['type'=>'nakshatra'])->asArray()->all(),'name','name');
                            echo $form->field($model, 'nakshatra')->dropDownList($nakshtra, ['prompt' => 'select nakshatra']);    
                        ?>                 
                    </div>
                    
                </div>

                <div class="row">
                    <div class=" col-md-6">
                        <?= $form->field($model, 'charan')->textInput() ?>                                                                               
                    </div>
                    <div class=" col-md-6">
                        <?= $form->field($model, 'nadi')->textInput(['maxlength' => true]) ?>                                     
                    </div>
                    
                </div>

                <div class="row">
                    <div class=" col-md-6">
                       <?= $form->field($model, 'gan')->textInput(['maxlength' => true]) ?>                                                            
                    </div>
                    <div class=" col-md-6">
                        <?= $form->field($model, 'gotra')->textInput(['maxlength' => true]) ?>                                     
                    </div>
                    
                </div>

                <div class="row">
                        <div class=" col-md-6">
                            <?php
                                 $interestedIn=ArrayHelper::map(\common\models\Masters::find()->where(['type'=>'interested_in'])->asArray()->all(), 'name', 'name');
                                    echo  $form->field($model, 'interested_in')->dropDownList($interestedIn,['prompt'=>'Select area of interest'])
                             ?>    
                        </div>
                    <div class=" col-md-6">
                           <?= $form->field($model, 'education')->textInput(['maxlength' => true]) ?>                                       
                    </div>
                </div>

                <div class="row">
                    <div class=" col-md-6">
                        <?= $form->field($model, 'occupation')->textInput(['maxlength' => true]) ?>
                            
                    </div>
                    <div class=" col-md-6">
                        <?= $form->field($model, 'income')->textInput(['maxlength' => true]) ?>                                      
                    </div>
                    
                </div>
                <div class="row">
                            <div class="col-md-12">
                                <?= $form->field($model, 'residensial_address')->textarea(['rows' => 2])?>
                            </div>
                </div>   

                <div class="row">
                    <div class=" col-md-6">
                        <?= $form->field($model, 'father')->textInput(['maxlength' => true]) ?>                      
                    </div>
                    <div class=" col-md-6">
                        <?= $form->field($model, 'mother')->textInput(['maxlength' => true]) ?>                  
                    </div>
                    
                </div>
                <div class="row">
                    <div class=" col-md-6">
                        <?= $form->field($model, 'brothers')->textInput() ?>
                    </div>
                    <div class=" col-md-6">
                        <?= $form->field($model, 'sisters')->textInput() ?>
                    </div>
                </div>    
                
                <div class="row">
                    <div class=" col-md-6">
                            <?php 
                                $data = ArrayHelper::map(\common\models\Masters::find()->where(['parent_id'=>0,'type'=>'caste'])->asArray()->all(),'id','name');
                            ?>
                            <?php echo $form->field($model, 'expected_caste')->dropDownList($data,
                            ['prompt'=>'Select Expected Caste',

                            'onchange'=>'
                                $.get({url:"'.Yii::$app->urlManager->createUrl('profiles/subcaste') . '",data:{id:$(this).val()}, 
                                success:function( data ) {
                                    $( "select#profiles-expected_sub_caste" ).html( data );
                                }});',

                           ]);?>       
                    </div>
                     <div class="col-md-6">
                               <?php
                                    $data = ArrayHelper::map(\common\models\Masters::find()->where(['!=','parent_id',0])->asArray()->all(),'id','name');
                                // $form->field($model, 'sub_caste')->textInput(['maxlength' => true])
                                ?>
                                <?php 
                                        echo $form->field($model, 'expected_sub_caste')->dropDownList($data,
                                ['prompt'=>'Select Expected Sub Caste']);
                               ?>       
                            </div>
                </div>

                <div class="row">
                    <div class=" col-md-6">
                         <?= $form->field($model, 'expected_min_age')->textInput() ?>
                    </div>
                    <div class=" col-md-6">
                        <?= $form->field($model, 'expected_max_age')->textInput() ?>
                    </div>
                </div>

                <div class="row">
                    <div class=" col-md-6">
                        <?= $form->field($model, 'expected_min_height')->textInput() ?>
                    </div>
                    <div class=" col-md-6">
                        <?= $form->field($model, 'expected_max_height')->textInput() ?>
                    </div>
                </div>

                <div class="row">
                    <div class=" col-md-6">
                              <?= $form->field($model, 'expected_education')->textInput(['maxlength' => true]) ?>
                    </div>
                    <div class=" col-md-6">
                        <?= $form->field($model, 'expected_occupation')->textInput(['maxlength' => true]) ?>                  
                    </div>
                </div>
            </div>
            
        </div>    
            <div class="row">
                <div class="col-md-offset-4 col-md-4">
                <div class="form-group">
                    <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary btn-block']) ?>
                 </div>    
            </div>
            

    <?php ActiveForm::end(); ?>
    </div>
    
</div>

    

    

    
    

    

</div>
    


    

    
   

    

    

    

    

    

    

    

    

    

    

    

   