<?php 
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

?>
    <?php $form = ActiveForm::begin([
        'action' => ['profile/search'],
        'method' => 'get',
    ]); ?>

          <div class="search_top">
            <div class="inline-block">
              <label class="gender_1"><?php echo \Yii::t('app', 'I am looking for');?> :</label>
              <div class="age_box1" style="max-width: 100%; display: inline-block;">
                    <?= $form->field($searchModel, 'gender')->dropDownList([ 'm' => 'Male', 'f' => 'Female', ], ['prompt' => 'select gender'])->label(false); ?>                      
              </div>
            </div>
            <div class="inline-block">
              <label class="gender_1"><?php echo \Yii::t('app', 'Located In ');?> :</label>
                <div class="age_box1" style="max-width: 100%; display: inline-block;">
               <?php 
                  $query = new yii\db\Query();
                  $city="";
                  $data = $query->select(['city'])
                  ->from('profiles')
                  ->distinct()
                  ->where(['not', ['city' => null]])
                  ->andWhere(['not', ['city' => $city]])
                  ->all(); 
                  $maritalStatus = ArrayHelper::map($data,'city','city');
                  echo $form->field($searchModel, 'city')->dropDownList($maritalStatus, ['prompt' => 'select Location'])->label(false);    
                    ?>          
                </div>
            </div>
            <div class="inline-block">
              <label class="gender_1"><?php echo \Yii::t('app', 'Interested In');?> :</label>
                <div class="age_box1" style="max-width: 100%; display: inline-block;">
                 <?php
                  $maritalStatus=ArrayHelper::map(\common\models\Masters::find()->where(['type'=>'interested_in'])->asArray()->all(),'name','name');
                  echo $form->field($searchModel, 'interested_in')->dropDownList($maritalStatus, ['prompt' => 'Select Interest'])->label(false);    
                    ?>         
                </div>
            </div>
          </div>
          <div class="inline-block">
            <div class="row" style="max-width: 220px;">
              <div class="col-md-2">
              <label class="gender_1"><?php echo \Yii::t('app', 'Age');?></label>  
              </div>
              
              <div class="col-md-4">
              <?= $form->field($searchModel, 'age_from')->textInput(['maxlength' => true,'placeholder'=>'from' ,'class'=>'transparent','style'=>'width:150%;'])->label(false); ?>
                
              </div>
              <div class="col-md-1">
                &nbsp;-&nbsp;  
              </div>
              <div class="col-md-4">
              <?= $form->field($searchModel, 'age_to')->textInput(['maxlength' => true,'placeholder'=>'to' ,'class'=>'transparent' ,'style'=>'width:150%; '])->label(false); ?>
              </div>
              <!-- <input class="transparent" placeholder="From:" style="width: 34%;" type="text" value="">&nbsp;-&nbsp;<input class="transparent" placeholder="To:" style="width: 34%;" type="text" value=""> -->
            </div>
          </div>
          <div class="inline-block">
            <div class="row">
              <div class="col-md-4">
                <label class="gender_1"><?php echo \Yii::t('app', 'Marital Status');?> :</label>
              </div>  
              <!-- <div class="col-md-8"> -->
                  <div class="col-md-8" style="max-width: 100%; display: inline-block;">
                        <?php
                        $maritalStatus=ArrayHelper::map(\common\models\Masters::find()->where(['type'=>'marital_status'])->asArray()->all(),'name','name');
                        echo $form->field($searchModel, 'marital_status')->dropDownList($maritalStatus, ['prompt' => 'select marital status'])->label(false);    
                          ?>          
                 </div>
              <!-- </div> -->
            </div>
          </div>
          <div class=" inline-block">
            <div class="row">
            <div class="col-md-12">
              <input id="submit-btn" class="hvr-wobble-vertical" style="margin-bottom:15px;" type="submit" value="<?php echo \Yii::t('app', 'Find matches');?>">
              </div></div>
          </div>
<?php ActiveForm::end(); ?>