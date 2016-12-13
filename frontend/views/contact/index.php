<?php

use yii\helpers\Html;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $searchModel common\models\ContactSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
// print_r($contact);exit;
$this->title = 'Contacts';
?>
<div class="grid_3">
  <div class="container">
   <div class="breadcrumb1">
     <ul>
        <a href="<?php echo Url::toRoute('site/index');?>"><i class="fa fa-home home_1"></i></a>
        <span class="divider">&nbsp;|&nbsp;</span>
        <li class="current-page"><?= Html::encode($this->title) ?></li>
     </ul>
   </div>
    <div class="col_4">
        <div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
           <ul id="myTab" class="nav nav-tabs nav-tabs1" role="tablist">
              <li role="presentation" ><a href="<?php echo Url::toRoute('profile/update')?>" id="home-tab" role="tab" >Basic Detail</a></li>
              <li role="presentation">
              <a href="<?php echo Url::toRoute('education/index');?>" role="tab" id="profile-tab" >Education Details</a></li>
              <li role="presentation"  class="active"><a href="<?php echo Url::toRoute('contact/index');?>" role="tab" id="profile-tab1" >Contact Details</a></li>
           </ul>
            <div id="myTabContent" class="tab-content">
                <div role="tabpanel" class="tab-pane fade in active" id="home" aria-labelledby="home-tab">
                    <div class="basic_1">
                       <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Sr.No.</th>
                                    <th>Contact Person Name</th>
                                    <th>Phone Number</th>
                                    <th>Email</th>
                                    <th>Description</th>
                                    <th colspan="2">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php $j=1; for($i=0; $i < $count; $i++) { 
                            ?>    
                                <tr>
                                   <td><?= $j?></td> 
                                   <td><?= $contact[$i]['name']?></td>
                                   <td><?= $contact[$i]['phone']?></td>
                                   <td><?= $contact[$i]['email']?></td>
                                   <td><?= $contact[$i]['message']?></td>           
                                   <td><a href="<?php echo Url::toRoute('contact/update')."&id=".$contact[$i]['id'];?>" class="btn btn-primary btn-block btn_1">Update</a></td>
                                   <td><a href="<?php echo Url::toRoute('contact/delete')."&id=".$contact[$i]['id'];?>" class="btn btn-primary btn-block btn_1">Delete</a></td>
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