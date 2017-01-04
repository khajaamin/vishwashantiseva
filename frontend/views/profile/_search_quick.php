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
            <div class="age_box2" style="max-width: 220px;">
              <label class="gender_1"><?php echo \Yii::t('app', 'Age');?> :</label>
              <input class="transparent" placeholder="From:" style="width: 34%;" type="text" value="">&nbsp;-&nbsp;<input class="transparent" placeholder="To:" style="width: 34%;" type="text" value="">
            </div>
          </div>
          <div class="inline-block">
            <label class="gender_1"><?php echo \Yii::t('app', 'Marital Status');?> :</label>
            <div class="age_box1" style="max-width: 100%; display: inline-block;">
                  <?php
                  $maritalStatus=ArrayHelper::map(\common\models\Masters::find()->where(['type'=>'marital_status'])->asArray()->all(),'name','name');
                  echo $form->field($searchModel, 'marital_status')->dropDownList($maritalStatus, ['prompt' => 'select marital status'])->label(false);    
                    ?>          
          
            </div>
          </div>
          <div class="submit inline-block">
             <input id="submit-btn" class="hvr-wobble-vertical" type="submit" value="<?php echo \Yii::t('app', 'Find matches');?>">
          </div>
<?php ActiveForm::end(); ?>