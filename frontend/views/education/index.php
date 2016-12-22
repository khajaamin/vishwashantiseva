<?php

use yii\helpers\Html;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $searchModel common\models\EducationSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
//echo $education->id;

$this->title = 'Education Details';
?>
<div class="grid_3">
  <div class="container">
   <div class="breadcrumb1">
     <ul>
        <a href="<?php echo Url::toRoute('site/index');?>"><i class="fa fa-home home_1"></i></a>
        <span class="divider">&nbsp;|&nbsp;</span>
        <li class="current-page"><?= Html::encode(\Yii::t('app',$this->title)) ?></li>
     </ul>
   </div>
    <div class="col_4">
        <div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
           <ul id="myTab" class="nav nav-tabs nav-tabs1" role="tablist">
              <li role="presentation" ><a href="<?php echo Url::toRoute('profile/update')?>" id="home-tab" role="tab" ><?php echo \Yii::t('app', 'Basic Info');?></a></li>
              <li role="presentation" class="active">
              <a href="<?php echo Url::toRoute('education/index');?>" role="tab" id="profile-tab" ><?php echo \Yii::t('app', 'Education Details');?></a></li>
              <li role="presentation"><a href="<?php echo Url::toRoute('contact/index');?>" role="tab" id="profile-tab1" ><?php echo \Yii::t('app', 'Contact Details');?></a></li>
           </ul>
            <div id="myTabContent" class="tab-content">
                <div role="tabpanel" class="tab-pane fade in active" id="home" aria-labelledby="home-tab">
                    <div class="basic_1">
                       <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th><?php echo \Yii::t('app', 'Sr.No.');?></th>
                                    <th><?php echo \Yii::t('app', 'Education Area');?></th>
                                    <th><?php echo \Yii::t('app', 'Education');?></th>
                                    <th><?php echo \Yii::t('app', 'Start Date');?></th>
                                    <th><?php echo \Yii::t('app', 'End Date');?></th>
                                    <th><?php echo \Yii::t('app', 'Institute');?></th>
                                    <th><?php echo \Yii::t('app', 'Result');?></th>
                                    <th><?php echo \Yii::t('app', 'Place');?></th>
                                    <th colspan="2"><CENTER><?php echo \Yii::t('app', 'Actions');?></CENTER></th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php $j=1; for($i=0; $i < $count; $i++) { 
                            ?>    
                                <tr>
                                   <td><?= $j?></td> 
                                   <td><?= $education[$i]['education_area']?></td>
                                   <td><?= $education[$i]['education']?></td>
                                   <td><?= $education[$i]['start_date']?></td>
                                   <td><?= $education[$i]['end_date']?></td>
                                   <td><?= $education[$i]['institute']?></td>
                                   <td><?= $education[$i]['result']?></td>
                                   <td><?= $education[$i]['place']?></td>           
                                   <td><a href="<?php echo Url::toRoute('education/update')."&id=".$education[$i]['id'];?>" class="btn btn-primary btn-block btn_1"><?php echo \Yii::t('app', 'Update');?></a></td>
                                   <td><a href="<?php echo Url::toRoute('education/delete')."&id=".$education[$i]['id'];?>" class="btn btn-primary btn-block btn_1"><?php echo \Yii::t('app', 'Delete');?></a></td>
                                </tr>
                            <?php  
                               
                              
                               $j++;
                            } ?>     
                            </tbody>
                           
                       </table>



                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>