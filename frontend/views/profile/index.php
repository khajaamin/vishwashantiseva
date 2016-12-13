<?php

use yii\helpers\Html;

use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $searchModel common\models\ProfilesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
//print_r($education);exit;

$this->title = 'Profiles';
?>
<div class="profiles-index">
    <div class="grid_3">
  <div class="container">
   <div class="breadcrumb1">
     <ul>
        <a href="index.html"><i class="fa fa-home home_1"></i></a>
        <span class="divider">&nbsp;|&nbsp;</span>
        <li class="current-page">View Profile</li>
     </ul>
   </div> 
  <?php if (Yii::$app->session->hasFlash('success')): ?>
<!--   <div class="alert alert-success alert-dismissable">
    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
    <!-- <strong><i class="icon fa fa-check"></i> Successful ! </strong> -->
  <?php //Yii::$app->session->getFlash('success') ?>
  <!--</div> -->
  <?php endif; ?>
   <div class="profile">
     <div class="col-md-12 profile_left">
        <h2>Name : <?= $profile->name?></h2>
        <div class="col_3">
            <div class="col-sm-4 row_2">
                <img src="<?= 'images/profile/'.$profile->profile_image?>" width="250px" height="150px"> 
            </div>
            <div class="col-sm-8 row_1">
                <table class="table_working_hours">
                    <tbody>
                        <tr class="opened_1">
                            <td class="day_label">City :</td>
                            <td class="day_value"><?= $profile->city?></td>
                        </tr>
                        <tr class="opened">
                            <td class="day_label">State</td>
                            <td class="day_value"><?= $profile->state?></td>
                        </tr>
                        <tr class="opened">
                            <td class="day_label">Country</td>
                            <td class="day_value"><?= $profile->country?></td>
                        </tr>
                        <tr class="opened">
                            <td class="day_label">Mobile Number :</td>
                            <td class="day_value"><?= $profile->mobile ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="clearfix"> </div>
        </div>
        <div class="col_4">
            <div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
               <ul id="myTab" class="nav nav-tabs nav-tabs1" role="tablist">
                  <li role="presentation" class="active"><a href="#home" id="home-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true">Basic Info</a></li>
                  <li role="presentation"><a href="#profile" role="tab" id="profile-tab" data-toggle="tab" aria-controls="profile">Family Details</a></li>
                  <li role="presentation"><a href="#profile1" role="tab" id="profile-tab1" data-toggle="tab" aria-controls="profile1">Partner Preference</a></li>
                  <li role="presentation"><a href="#profile2" role="tab" id="profile-tab1" data-toggle="tab" aria-controls="profile1">Education Details</a></li>
                  <li role="presentation"><a href="#profile3" role="tab" id="profile-tab1" data-toggle="tab" aria-controls="profile1">Contact Details</a></li>
               </ul>
               <div id="myTabContent" class="tab-content">
                  <div role="tabpanel" class="tab-pane fade in active" id="home" aria-labelledby="home-tab">
                    <div class="basic_1">
                        <h3>Basics & Lifestyle</h3>
                        <div class="col-md-6 basic_1-left">
                          <table class="table_working_hours">
                            <tbody>
                                <tr class="opened_1">
                                    <td class="day_label">Name :</td>
                                    <td class="day_value"><?= $profile->name?></td>
                                </tr>
                                <tr class="opened">
                                    <td class="day_label">Marital Status :</td>
                                    <td class="day_value"><?= $profile->marital_status?></td>
                                </tr>
                                <tr class="opened">
                                    <td class="day_label">Body Type :</td>
                                    <td class="day_value"><?php if($profile->built==''){
                                            echo "Not Mentioned";
                                        }else{
                                             echo $profile->built;   
                                        }?></td>
                                </tr>
                                <tr class="opened">
                                    <td class="day_label">Height :</td>
                                    <td class="day_value">
                                        <?php if($profile->height==''){
                                            echo "Not Mentioned";
                                        }else{
                                             echo $profile->height.' ft';   
                                        }?>
                                    </td>
                                </tr>
                                <tr class="opened">
                                    <td class="day_label">Profile Created by :</td>
                                    <td class="day_value closed"><span>
                                    <?php   
                                    if($user->profile_for=='self'){
                                     echo $user->profile_for;   
                                    }else{
                                        echo 'Family/Relatives';
                                    }?>
                                    </span></td>
                                </tr>
                            </tbody>
                          </table>
                         </div>
                         <div class="col-md-6 basic_1-left">
                          <table class="table_working_hours">
                            <tbody>
                                <tr class="opened">
                                    <td class="day_label">Mother Tongue :</td>
                                    <td class="day_value"><?= $user->mother_tongue ?></td>
                                </tr>
                                <tr class="opened">
                                    <td class="day_label">Complexion :</td>
                                    <td class="day_value"><?php if($profile->complextion==''){
                                            echo "Not Mentioned";
                                        }else{
                                             echo $profile->complextion;   
                                        }?></td>
                                </tr>
                                <tr class="opened">
                                    <td class="day_label">Weight :</td>
                                    <td class="day_value">
                                    <?php if($profile->weight==''){
                                            echo "Not Mentioned";
                                        }else{
                                             echo $profile->weight.' kg.';   
                                        }?>    
                                    </td>
                                </tr>
                                <tr class="opened">
                                    <td class="day_label">Blood Group :</td>
                                    <td class="day_value"><?php if($profile->blood_group==''){
                                            echo "Not Mentioned";
                                        }else{
                                             echo $profile->blood_group;   
                                        }?>    
                                    </td>
                                </tr>
                                <tr class="closed">
                                    <td class="day_label">Diet :</td>
                                    <td class="day_value closed"><span><?php if($profile->diet==''){
                                            echo "Not Mentioned";
                                        }else{
                                             echo $profile->diet;   
                                        }?></span></td>
                                </tr>
                            </tbody>
                        </table>
                        </div>
                        <div class="clearfix"> </div>
                    </div>
                    <div class="basic_1">
                        <h3>Religious / Social & Astro Background</h3>
                        <div class="col-md-6 basic_1-left">
                          <table class="table_working_hours">
                            <tbody>
                                <tr class="opened">
                                    <td class="day_label">Time of Birth :</td>
                                    <td class="day_value">
                                        <?php if($profile->birthtime==''){
                                            echo "Not Mentioned";
                                        }else{
                                             echo $profile->birthtime;   
                                        }?>
                                    </td>
                                </tr>
                                <tr class="opened">
                                    <td class="day_label">Caste :</td>
                                    <td class="day_value">
                                    <?php if($profile->caste==''){
                                            echo "Not Mentioned";
                                        }else{
                                             echo $profile->caste;   
                                        }?></td>
                                </tr>
                                <tr class="opened">
                                    <td class="day_label">Date of Birth :</td>
                                    <td class="day_value closed"><span>
                                    <?php if($profile->date_of_birth==''){
                                            echo "Not Mentioned";
                                        }else{
                                             echo $profile->date_of_birth;   
                                        }?>
                                    </span></td>
                                </tr>
                                <tr class="opened">
                                    <td class="day_label">Place of Birth :</td>
                                    <td class="day_value closed"><span>
                                    <?php if($profile->birthplace==''){
                                            echo "Not Mentioned";
                                        }else{
                                             echo $profile->birthplace;   
                                        }?>
                                            
                                        </span></td>
                                </tr>
                                <tr class="opened">
                                    <td class="day_label">Charan :</td>
                                    <td class="day_value closed"><span>
                                    <?php if($profile->charan==''){
                                            echo "Not Mentioned";
                                        }else{
                                             echo $profile->charan;   
                                        }?>
                                            
                                        </span></td>
                                </tr>
                                <tr class="opened">
                                    <td class="day_label">Nadi :</td>
                                    <td class="day_value closed"><span>
                                    <?php if($profile->nadi==''){
                                            echo "Not Mentioned";
                                        }else{
                                             echo $profile->nadi;   
                                        }?>
                                            
                                        </span></td>
                                </tr>
                             </tbody>
                          </table>
                         </div>
                         <div class="col-md-6 basic_1-left">
                          <table class="table_working_hours">
                            <tbody>
                                <tr class="opened_1">
                                    <td class="day_label">Religion :</td>
                                    <td class="day_value">
                                    <?php if($profile->religion==''){
                                            echo "Not Mentioned";
                                        }else{
                                             echo $profile->religion;   
                                        }?>
                                    </td>
                                </tr>
                                <tr class="opened">
                                    <td class="day_label">Sub Caste :</td>
                                    <td class="day_value">
                                    <?php if($profile->sub_caste==''){
                                            echo "Not Mentioned";
                                        }else{
                                             echo $profile->sub_caste;   
                                        }?></td>
                                </tr>
                                <tr class="opened">
                                    <td class="day_label">Rashi :</td>
                                    <td class="day_value"><?php if($profile->rashi==''){
                                            echo "Not Mentioned";
                                        }else{
                                             echo $profile->rashi;   
                                        }?></td>
                                </tr>
                                <tr class="opened">
                                    <td class="day_label">Nakshtra :</td>
                                    <td class="day_value"><?php if($profile->nakshatra==''){
                                            echo "Not Mentioned";
                                        }else{
                                             echo $profile->nakshatra;   
                                        }?></td>
                                </tr>
                                <tr class="opened">
                                    <td class="day_label">Gan :</td>
                                    <td class="day_value"><?php if($profile->gan==''){
                                            echo "Not Mentioned";
                                        }else{
                                             echo $profile->gan;   
                                        }?></td>
                                </tr>
                                <tr class="opened">
                                    <td class="day_label">Gotra :</td>
                                    <td class="day_value"><?php if($profile->gotra==''){
                                            echo "Not Mentioned";
                                        }else{
                                             echo $profile->gotra;   
                                        }?></td>
                                </tr>
                            </tbody>
                        </table>
                        </div>
                        <div class="clearfix"> </div>
                    </div>
                    <div class="basic_1 basic_2">
                        <h3>Education & Career</h3>
                        <div class="basic_1-left">
                          <table class="table_working_hours">
                            <tbody>
                                <tr class="opened">
                                    <td class="day_label">Education   :</td>
                                    <td class="day_value">
                                    <?php if($profile->education==''){
                                            echo "Not Mentioned";
                                        }else{
                                             echo $profile->education;   
                                        }?>
                                
                                        </td>
                                </tr>
                                <tr class="opened">

                                    <td class="day_label">Occupation Detail :</td>
                                    <td class="day_value closed"><?php if($profile->occupation==''){
                                            echo "Not Mentioned";
                                        }else{
                                             echo $profile->occupation;   
                                        }?></td>
                                </tr>

                                <tr class="opened">
                                    <td class="day_label">Annual Income :</td>
                                    <td class="day_value closed"><?php if($profile->income==''){
                                            echo "Not Mentioned";
                                        }else{
                                             echo $profile->income;   
                                        }?></td>
                                </tr>
                             </tbody>
                          </table>
                         </div>
                         <div class="clearfix"> </div>
                    </div>
                    <div class="form-group">
                        <a class="btn btn-primary btn_1" href="<?php echo Url::toRoute('profile/update')?>">Update</a>
                    </div>
                  </div>
                  <div role="tabpanel" class="tab-pane fade" id="profile" aria-labelledby="profile-tab">
                    <div class="basic_3">
                        <h4>Family Details</h4>
                        <div class="basic_1 basic_2">
                        <h3>Basics</h3>
                        <div class="">
                        <div class="basic_1-left">
                          <table class="table_working_hours">
                            <tbody>
                                <tr class="opened">
                                    <td class="day_label">Father's Name :</td>
                                    <td class="day_value"><?= $profile->father ?></td>
                                </tr>
                                <tr class="opened">
                                    <td class="day_label">Mother's Occupation :</td>
                                    <td class="day_value"><?= $profile->mother ?></td>
                                </tr>
                                <tr class="opened">
                                    <td class="day_label">No. of Brothers :</td>
                                    <td class="day_value closed"><span><?= $profile->brothers ?></span></td>
                                </tr>
                                <tr class="opened">
                                    <td class="day_label">No. of Sisters :</td>
                                    <td class="day_value closed"><span><?= $profile->sisters ?></span></td>
                                </tr>
                             </tbody>
                          </table>
                         </div>
                         </div>
                            <div class="form-group">
                                <a class="btn btn-primary btn_1" href="<?php echo Url::toRoute('profile/update')?>">Update</a>
                            </div>
                       </div>
                    </div>                    
                 </div>
                 <div role="tabpanel" class="tab-pane fade" id="profile1" aria-labelledby="profile-tab1">
                    <div class="basic_1 basic_2">
                       <div class="basic_1-left">
                          <table class="table_working_hours">
                            <tbody>                            
                                <tr class="opened">
                                    <td class="day_label">Age   :</td>
                                    <td class="day_value">
                                    <?php            
                                    if($profile->expected_min_age =="" && $profile->expected_max_age ==""){
                                        echo "Not Mentioned";
                                    }else{
                                        echo $profile->expected_min_age.' Yrs To '.$profile->expected_max_age.' Yrs';    
                                    }
                                    ?>
                                    </td>
                                </tr>
                                <tr class="opened">
                                    <td class="day_label">Height :</td>
                                    <td class="day_value closed"> 
                                    <?php            
                                    if($profile->expected_min_height =="" && $profile->expected_max_height ==""){
                                        echo "Not Mentioned";
                                    }else{
                                        echo $profile->expected_min_height.' To '.$profile->expected_max_height;    
                                    }
                                    ?></td>
                                </tr>
                                <tr class="opened">
                                    <td class="day_label">Caste :</td>
                                    <td class="day_value closed"><?php            
                                    if($profile->expected_caste =="" && $profile->expected_caste ==""){
                                        echo "Not Mentioned";
                                    }else{
                                        echo $profile->expected_caste;   
                                    }
                                    ?></td>
                                </tr>
                                <tr class="opened">
                                    <td class="day_label">Education :</td>
                                    <td class="day_value closed"><?php            
                                    if($profile->expected_education =="" && $profile->expected_education ==""){
                                        echo "Not Mentioned";
                                    }else{
                                        echo $profile->expected_education;  
                                    }
                                    ?></td>
                                </tr>
                                <tr class="opened">
                                    <td class="day_label">Occupation :</td>
                                    <td class="day_value closed">
                                    <?php            
                                    if($profile->expected_occupation =="" && $profile->expected_occupation ==""){
                                        echo "Not Mentioned";
                                    }else{
                                        echo $profile->expected_occupation;    
                                    }
                                    ?></td>
                                </tr>
                             </tbody>
                          </table>
                        </div>
                     </div>
                    <div class="form-group">
                    <a class="btn btn-primary btn_1" href="<?php echo Url::toRoute('profile/update')?>">Update</a>
                    </div>
                 </div>
                 <div role="tabpanel" class="tab-pane fade in" id="profile2" aria-labelledby="profile-tab">
                    <div class="basic_3">
                       <div class="form-group">
                            <a href="<?php echo Url::toRoute('education/create')?>" class="btn btn-primary btn_1">Add More Education Details</a>
                       </div>
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
                 <div role="tabpanel" class="tab-pane fade in" id="profile3" aria-labelledby="profile-tab">
                    <div class="basic_3">
                        <div class="form-group">
                            <a href="<?php echo Url::toRoute('contact/create')?>" class="btn btn-primary btn_1">Add More Contact Details</a>  
                        </div>                        
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
                            <?php $j=1; for($i=0; $i < $count1; $i++) { 
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
     
       <div class="clearfix"> </div>
    </div>
  </div>
</div>
</div>
<script type="text/javascript">
$(window).load(function() {
  $('.flexslider').flexslider({
    animation: "slide",
    controlNav: "thumbnails"
  });
});    
</script>
