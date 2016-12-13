
<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\jui\DatePicker;
use yii\helpers\Url;
use kartik\time\TimePicker;

/* @var $this yii\web\View */
/* @var $model common\models\Profiles */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="profiles-form">
<?php $form = ActiveForm::begin(); ?>

<div class="row">
    <div class="col-md-6 bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
       <div id="myTabContent" class="tab-content">
            <div role="tabpanel" class="tab-pane fade in active" id="home" aria-labelledby="home-tab">
                <div class="basic_1">
                    <h3>Basic Information</h3>
                    <div class="basic_1-left">     
                        <div class="row">
                            <div class="col-md-12">
                                <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>                                
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <?= $form->field($model, 'profile_image')->fileInput() ?>            
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">  
                                <?= $form->field($model,'date_of_birth')->widget(yii\jui\DatePicker::className(),['dateFormat' => 'yyyy-MM-dd',
                                        'options' => ['class' => 'form-control']]) 
                                    ?>
                            </div>
                            <div class="col-md-6">
                                <?php 
                                    $maritalStatus=ArrayHelper::map(\common\models\Masters::find()->where(['type'=>'marital_status'])->asArray()->all(), 'name', 'name');
                                    echo $form->field($model, 'marital_status')->dropDownList($maritalStatus,['prompt'=>'Marital Status']) 
                                ?>                                 
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <?= $form->field($model, 'gender')->dropDownList([ 'm' => 'Male', 'f' => 'Female', ], ['prompt' => 'Select Gender']) ?>      
                            </div>
                            <div class="col-md-6">
                                <?= $form->field($model, 'mobile')->textInput() ?>           
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                               <?= $form->field($model, 'country')->textInput(['maxlength' => true]) ?>  
                            </div>
                            <div class="col-md-6">
                                <?= $form->field($model, 'state')->textInput(['maxlength' => true]) ?>    
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <?= $form->field($model, 'city')->textInput(['maxlength' => true])?> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>       
    <div class="col-md-6 bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
       <div id="myTabContent" class="tab-content">
            <div role="tabpanel" class="tab-pane fade in active" id="home" aria-labelledby="home-tab">
                <div class="basic_1">
                <h3>Physical and Education Details</h3>
                    <div class="basic_1-left">                                    
                        <div class="row">
                            <div class="col-md-6">
                                <?= $form->field($model, 'height')->textInput() ?>    
                            </div>
                            <div class="col-md-6">
                                <?= $form->field($model,  'weight')->textInput() ?>          
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <?php 
                                    $bloodGroup=ArrayHelper::map(\common\models\Masters::find()->where(['type'=>'blood_group'])->asArray()->all(), 'name', 'name');
                                    echo  $form->field($model, 'blood_group')->dropDownList($bloodGroup,['prompt'=>'Blood Group']) 
                                ?>                                 
                            </div>
                            <div class="col-md-6">
                                <?= $form->field($model, 'complextion')->textInput(['maxlength' => true]) ?>        
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <?= $form->field($model, 'built')->textInput(['maxlength' => true]) ?>
                            </div>
                            <div class="col-md-6">
                                <?= $form->field($model, 'diet')->textInput(['maxlength' => true]) ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <?= $form->field($model, 'education')->textInput(['maxlength' => true]) ?>  
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <?= $form->field($model, 'occupation')->textInput(['maxlength' => true]) ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <?= $form->field($model, 'income')->textInput(['maxlength' => true]) ?>   
                            </div>
                        </div>                                    
                    </div>                        
                </div>       
            </div>                      
        </div>               
    </div>                        
</div>
<div class="row">
    <div class="col-md-6 bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
       <div id="myTabContent" class="tab-content">
            <div role="tabpanel" class="tab-pane fade in active" id="home" aria-labelledby="home-tab">
                <div class="basic_1">
                    <h3>Astro Background</h3>
                    <div class="basic_1-left">                                    
                        <div class="row">
                            <div class="col-md-6">
                                <?= $form->field($model, 'birthplace')->textInput(['maxlength' => true]) ?>            
                            </div>
                            <div class="col-md-6">
                                <?php 

                                 // echo '<label>Birth Time</label>';
                                
                                 echo $form->field($model,'birthtime')->widget(kartik\time\TimePicker::className(),[
                                        'options' => ['class' => 'form-control','showSeconds' => true]]) 
                                    ?>
<!--                                  echo TimePicker::widget([
                                    'name' => 'birthtime', 
                                    'pluginOptions' => [
                                        'showSeconds' => true
                                    ]
                                ]);       --> 
                            
                            </div>
                        </div>           
                       <div class="row">
                            <div class="col-md-6">
                               <?= $form->field($model, 'religion')->textInput(['maxlength' => true]) ?>   
                            </div>
                            <div class="col-md-6">
                               <?= $form->field($model, 'caste')->textInput(['maxlength' => true]) ?>        
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <?= $form->field($model, 'sub_caste')->textInput(['maxlength' => true])?>
                            </div>
                            <div class="col-md-6">
                                <?php 
                                    $rashi=ArrayHelper::map(\common\models\Masters::find()->where(['type'=>'rashi'])->asArray()->all(), 'name', 'name');
                                    echo  $form->field($model, 'rashi')->dropDownList($rashi,['prompt'=>'Rashi']) 
                                ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <?php 
                                    $nakshatra=ArrayHelper::map(\common\models\Masters::find()->where(['type'=>'nakshatra'])->asArray()->all(), 'name', 'name');
                                    echo  $form->field($model, 'nakshatra')->dropDownList($nakshatra,['prompt'=>'Nakshatra']) 
                                ?>                                
                            </div>
                            <div class="col-md-6">
                                <?= $form->field($model, 'charan')->textInput() ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <?= $form->field($model, 'nadi')->textInput(['maxlength' => true]) ?>        
                            </div>
                            <div class="col-md-6">
                                <?php 
                                    $gan=ArrayHelper::map(\common\models\Masters::find()->where(['type'=>'gan'])->asArray()->all(), 'name', 'name');
                                    echo  $form->field($model, 'gan')->dropDownList($gan,['prompt'=>'Gan']) 
                                ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <?= $form->field($model, 'gotra')->textInput(['maxlength' => true]) ?>           
                            </div>
                        </div>
                    </div>                        
                </div>       
            </div>                      
        </div>               
    </div>
    <div class="col-md-6 bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
       <div id="myTabContent" class="tab-content">
            <div role="tabpanel" class="tab-pane fade in active" id="home" aria-labelledby="home-tab">
                <div class="basic_1">
                    <h3>Family and Partner Preference</h3>
                    <div class="basic_1-left">                                    
                        <div class="row">
                            <div class="col-md-6">
                               <?= $form->field($model, 'father')->textInput(['maxlength' => true]) ?> 
                            </div>
                            <div class="col-md-6">
                                <?= $form->field($model, 'mother')->textInput(['maxlength' => true]) ?> 
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <?= $form->field($model, 'brothers')->textInput() ?>   
                            </div>
                            <div class="col-md-6">
                              <?= $form->field($model, 'sisters')->textInput() ?>   
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <?= $form->field($model, 'expected_caste')->textInput(['maxlength' => true]) ?>        
                            </div>
                            <div class="col-md-6">
                                <?= $form->field($model, 'expected_min_age')->textInput() ?>            
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <?= $form->field($model, 'expected_max_age')->textInput() ?>        
                            </div>
                            <div class="col-md-6">
                                <?= $form->field($model, 'expected_min_height')->textInput() ?>         
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <?= $form->field($model, 'expected_max_height')->textInput() ?>               
                            </div>
                            <div class="col-md-6">
                                <?= $form->field($model, 'expected_education')->textInput(['maxlength' => true]) ?>         
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <?= $form->field($model, 'expected_occupation')->textInput(['maxlength' => true]) ?>           
                            </div>
                        </div>             
                    </div>                        
                </div>       
            </div>                      
        </div>               
    </div>
</div>
<div class="row">
    <div class="col-md-offset-4 col-md-4">
        <div class="form-group">
            <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success btn-block btn_1' : 'btn btn-primary btn-block btn_1']) ?>
        </div>        
    </div>
</div>
<?php ActiveForm::end(); ?>

</div>