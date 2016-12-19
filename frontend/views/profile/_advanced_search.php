<?php 
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;

?>

  <?php $form = ActiveForm::begin(['action' => ['profile/advancedsearch'],'method'=>'post']); ?>
                <div class="form_but1">
                  <label class="col-sm-5 control-lable1" for="sex">Gender : </label>
                  <div class="col-sm-7 form_radios">
                    <?= $form->field($searchModel, 'gender',['options' => ['class' => 'radio_1']])->radioList([ 'm' => 'Male', 'f' => 'Female', ], ['prompt' => 'select gender'])->label(false); ?>
                  </div>
                  <div class="clearfix"> </div>
                </div>
               
                <div class="form_but1">
                  <label class="col-sm-5 control-lable1" for="sex">Marital Status : </label>
                  <div class="col-sm-7 form_radios">
                      <?php
                      $maritalStatus=ArrayHelper::map(\common\models\Masters::find()->where(['type'=>'marital_status'])->asArray()->all(),'name','name');
                      echo $form->field($searchModel, 'marital_status',['options' => ['class' => 'radio_1']])->checkboxList($maritalStatus, ['prompt' => 'select marital status'])->label(false);    
                        ?>
                          
                  </div>
                  <div class="clearfix"> </div>
                </div>

                <div class="form_but1">
                  <label class="col-sm-5 control-lable1" for="sex">Country : </label>
                  <div class="col-sm-7 form_radios">
                    <div class="select-block1">
                      <?= $form->field($searchModel, 'country')->textInput(['maxlength' => true,'placeholder' => "Enter District / City"])->label(false); ?>
                    </div>
                  </div>
                  <div class="clearfix"> </div>
                </div>

                <div class="form_but1">
                  <label class="col-sm-5 control-lable1" for="sex">District / City : </label>
                  <div class="col-sm-7 form_radios">
                    <div class="select-block1">
                      <?= $form->field($searchModel, 'city')->textInput(['maxlength' => true,'placeholder' => "Enter District / City"])->label(false);?>
                    </div>
                  </div>
                  <div class="clearfix"> </div>
                </div>

                <div class="form_but1">
                  <label class="col-sm-5 control-lable1" for="sex">State : </label>
                  <div class="col-sm-7 form_radios">
                    <div class="select-block1">
                      <?= $form->field($searchModel, 'state')->textInput(['maxlength' => true,'placeholder' => "Enter State"])->label(false); ?>
                    </div>
                  </div>
                  <div class="clearfix"> </div>
                </div>

                <div class="form_but1">
                  <label class="col-sm-5 control-lable1" for="sex">Religion : </label>
                  <div class="col-sm-7 form_radios">
                    <div class="select-block1">
                      <?= $form->field($searchModel, 'religion')->textInput(['maxlength' => true,'placeholder' => "Enter Religion"])->label(false) ?>
                    </div>
                  </div>
                  <div class="clearfix"> </div>
                </div>

                <!-- <div class="form_but1">
                  <label class="col-sm-5 control-lable1" for="sex">Mother Tongue : </label>
                  <div class="col-sm-7 form_radios">
                    <div class="select-block1">
                    <?php
                        // $motherTongue=ArrayHelper::map(\common\models\Masters::find()->where(['type'=>'mother_tongue'])->asArray()->all(), 'name', 'name');

                        // echo $form->field($searchModel, 'mother_tongue')->dropDownList($motherTongue ,['prompt'=>'Mother Tongue'])->label(false); 
                    ?> 
                    </div>
                  </div>
                  <div class="clearfix"> </div>
                </div> -->
               
                
                <div class="form_but1">
                  <label class="col-sm-5 control-lable1" for="sex">Age : </label>
                  <div class="col-sm-7 form_radios">
                    <div class="col-sm-5 input-group1">
                        
                        <?= $form->field($searchModel, 'expected_min_age',['options' => ['class' => ' has-dark-background','id'=>'slider-name']])->textInput(['placeholder' => "25"])->label(false) ?>
                    </div>
                    <div class="col-sm-5 input-group1">
                      <?= $form->field($searchModel, 'expected_max_age',['options' => ['class' => ' has-dark-background','id'=>'slider-name']])->textInput(['placeholder' => "40"])->label(false) ?>
                    </div>
                    <div class="clearfix"> </div>
                  </div>

                  <div class="clearfix"> </div>
                </div>
                <div class=" col-md-offset-4 col-md-4 submit ">
                  <!-- <input id="" class="hvr-wobble-vertical btn-block btn-primary" type="submit" value="Find Matches"> -->
                  <?= Html::SubmitButton('Show Results',['class' => 'hvr-wobble-vertical btn-block btn-primary']); ?>
              </div>

            <?php ActiveForm::end(); ?>
