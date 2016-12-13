<?php

use yii\helpers\Html;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $searchModel common\models\EducationSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
//echo $education->id;

$this->title = 'Educations';
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
              <li role="presentation" class="active">
              <a href="<?php echo Url::toRoute('education/index');?>" role="tab" id="profile-tab" >Education Details</a></li>
              <li role="presentation"><a href="<?php echo Url::toRoute('contact/index');?>" role="tab" id="profile-tab1" >Contact Details</a></li>
           </ul>
            <div id="myTabContent" class="tab-content">
                <div role="tabpanel" class="tab-pane fade in active" id="home" aria-labelledby="home-tab">
                    <div class="basic_1">
                       <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Sr.No.</th>
                                    <th>Education Area</th>
                                    <th>Education</th>
                                    <th>Start Date</th>
                                    <th>End Date</th>
                                    <th>Institute</th>
                                    <th>Result</th>
                                    <th>Place</th>
                                    <th colspan="2">Actions</th>
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
                                   <td><a href="<?php echo Url::toRoute('education/update')."&id=".$education[$i]['id'];?>" class="btn btn-primary btn-block btn_1">Update</a></td>
                                   <td><a href="<?php echo Url::toRoute('education/delete')."&id=".$education[$i]['id'];?>" class="btn btn-primary btn-block btn_1">Delete</a></td>
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