<?php 
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

?>
    <?php $form = ActiveForm::begin([
        'action' => ['profile/search'],
        'method' => 'get',
        'options'=>['class' =>"form-inline"],
    ]); ?>

          <div class="search_top">
            <div class="form-group"></div>
            <div class="row">
                <div class="col-md-4 col-sm-12">
                  
                     <label for="gender" class="control-label search-label"> <?php echo \Yii::t('app', 'I am looking for');?> :</label>
                      <div class="form-group">
                      <?= $form->field($searchModel, 'gender')->dropDownList([ 'm' => 'Male', 'f' => 'Female', ], ['prompt' => 'select gender'])->label(false); ?>
                      </div>
                </div>
                <div class="col-md-4">
                        <label for="city" class="control-label search-label"><?php echo \Yii::t('app', 'Located In ');?> :</label>
                        <div class="form-group">
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
                <div class="col-md-4 col-sm-12">
                        <label for="name" class="control-label search-label"><?php echo \Yii::t('app', 'Interested In');?> :</label>
                        <div class="form-group">
                          <?php
                          $maritalStatus=ArrayHelper::map(\common\models\Masters::find()->where(['type'=>'interested_in'])->asArray()->all(),'name','name');
                          echo $form->field($searchModel, 'interested_in')->dropDownList($maritalStatus, ['prompt' => 'Select Interest'])->label(false);    
                            ?> 

                        </div>        
                </div>
            </div>
            <div class="form-group"></div>
            <div class="row">
              <div class="col-md-4">
                  <label for="age_form" class="control-label search-label"><?php echo \Yii::t('app', 'Age');?> : </label>
                  <div class="form-group">
                    <?= $form->field($searchModel, 'age_from')->textInput(['maxlength' => true,'placeholder'=>'from' ,'class'=>'transparent' ,'style'=>' max-width:100px;'])->label(false); ?> - 
                    <?= $form->field($searchModel, 'age_to')->textInput(['maxlength' => true,'placeholder'=>'to' ,'class'=>'transparent','style'=>' max-width:100px;'])->label(false); ?>     
                  </div>
              </div>
              <div class="col-md-4">
                <label for="marital_status" class="control-label search-label"><?php echo \Yii::t('app', 'Marital Status');?> :</label> 
                <div class="form-group">
                <?php                
                    $maritalStatus=ArrayHelper::map(\common\models\Masters::find()->where(['type'=>'marital_status'])->asArray()->all(),'name','name');
                        echo $form->field($searchModel, 'marital_status')->dropDownList($maritalStatus, ['prompt' => 'select marital status'])->label(false);    
                ?>
                </div>                         
              </div>
              <div class="col-md-4">
                <input id="submit-btn" class="hvr-wobble-vertical" style="margin-bottom:15px;" type="submit" value="<?php echo \Yii::t('app', 'Find matches');?>">               
              </div>
            </div>  
        </div>   
<?php ActiveForm::end(); ?>