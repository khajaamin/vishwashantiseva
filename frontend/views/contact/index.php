<?php

use yii\helpers\Html;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $searchModel common\models\ContactSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
// print_r($contact);exit;
$this->title = 'Contact Details';
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
              <li role="presentation">
              <a href="<?php echo Url::toRoute('education/index');?>" role="tab" id="profile-tab" ><?php echo \Yii::t('app', 'Education Details');?></a></li>
              <li role="presentation"  class="active"><a href="<?php echo Url::toRoute('contact/index');?>" role="tab" id="profile-tab1" ><?php echo \Yii::t('app', 'Contact Details');?></a></li>
           </ul>
            <div id="myTabContent" class="tab-content">
                <div role="tabpanel" class="tab-pane fade in active" id="home" aria-labelledby="home-tab">
                    <div class="basic_1">
                       <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th><?php echo \Yii::t('app', 'Sr.No.');?></th>
                                    <th><?php echo \Yii::t('app', 'Contact Person Name');?></th>
                                    <th><?php echo \Yii::t('app', 'Phone Number');?></th>
                                    <th><?php echo \Yii::t('app', 'Email');?></th>
                                    <th><?php echo \Yii::t('app', 'Description');?></th>
                                    <th><?php echo \Yii::t('app', 'Actions');?></th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php $j=1; for($i=0; $i < $count; $i++) {
                               if(!empty($contact[$i]['name']) || $contact[$i]['name']!=0 || $contact[$i]['name']!=NULL || $contact[$i]['name']!='') 
                                           { 
                            ?>    
                                <tr>
                                   <td><?= $j?></td> 
                                   <td><?= $contact[$i]['name']?></td>
                                   <td><?= $contact[$i]['phone']?></td>
                                   <td><?= $contact[$i]['email']?></td>
                                   <td><?= $contact[$i]['message']?></td>           
                                   <td><a href="<?php echo Url::toRoute('contact/update')."&id=".$contact[$i]['id'];?>" class="btn btn-primary btn-block btn_1"><?php echo \Yii::t('app', 'Update');?></a></td>
                                   
                                </tr>
                            <?php  
                               
                              
                               $j++;
                             }
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