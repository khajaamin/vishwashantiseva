<?php

use yii\helpers\Html;
use frontend\components\SearchById;
use common\models\CommonHelper; 
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $searchModel common\models\ProfilesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
//print_r($education);exit;
//$this->registerJsFile('@web/js/print.js');
$this->title = 'Profiles';
?>

<div class="profiles-index">
    <div class="grid_3">
        <div class="container">
            <div class="breadcrumb1">
                <ul>
                    <a href="<?php echo Url::toRoute('site/index');?>"><i class="fa fa-home home_1"></i></a>
                    <span class="divider">&nbsp;|&nbsp;</span>
                    <li class="current-page"><?php echo \Yii::t('app', 'View Profile');?></li>
                </ul>
            </div> 
           <?php if (Yii::$app->session->hasFlash('success')): ?>
           <!--   <div class="alert alert-success alert-dismissable">
            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
            <!- <strong><i class="icon fa fa-check"></i> Successful ! </strong> -->
           <?php //Yii::$app->session->getFlash('success') ?>
           <!--</div> -->
           <?php endif; ?>
           <div class="profile">
            
            <div class="col-md-8 profile_left">
                <div class="col-md-4">
                <h2><?php echo \Yii::t('app', 'Name');?> : <?= $profile->name?></h2>
                </div>
                <div class="col-md-offset-4 col-md-4">
                     <div class="form-group pull-right">
                         <button class="btn btn-primary btn_1" style="margin: 0px;" onclick="printDiv('printarea')"><span class="glyphicon glyphicon-print"></span> <?php echo \Yii::t('app', 'Print');?></button>
                     </div>
                 </div>
                <div class="col_3">
                    <div class="col-sm-4 row_2">
                        <?php
                        if(empty($profile->profile_image)){
                             if($profile->gender=='m'){
                            ?>
                            
                            <img src="images/default.jpg" width="250px" height="150px" class="img-responsive">

                            <?php }else{?>

                            <img src="images/defaultb.jpeg" width="250px" height="150px" class="img-responsive">

                            <?php   }
                        }else{ ?>

                            <img src="<?= 'images/profile/'.$profile->profile_image?>" width="250px" height="150px">

                        <?php } ?>  
                    </div>
                    <div class="col-sm-8 row_1">
                        <table class="table_working_hours">
                            <tbody>
                                <tr class="opened_1">
                                    <td class="day_label"><?php echo \Yii::t('app', 'City');?> :</td>
                                    <td class="day_value"><?= $profile->city?></td>
                                </tr>
                                <tr class="opened">
                                    <td class="day_label"><?php echo \Yii::t('app', 'State');?></td>
                                    <td class="day_value"><?= $profile->state?></td>
                                </tr>
                                <tr class="opened">
                                    <td class="day_label"><?php echo \Yii::t('app', 'Country');?></td>
                                    <td class="day_value"><?= $profile->country?></td>
                                </tr>
                                <tr class="opened">
                                    <td class="day_label"><?php echo \Yii::t('app', 'Mobile Number');?> :</td>
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
                          <li role="presentation" class="active"><a href="#home" id="home-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true"><?php echo \Yii::t('app', 'Basic Info');?></a></li>
                          <li role="presentation"><a href="#profile" role="tab" id="profile-tab" data-toggle="tab" aria-controls="profile"><?php echo \Yii::t('app', 'Family Details');?></a></li>
                          <li role="presentation"><a href="#profile1" role="tab" id="profile-tab1" data-toggle="tab" aria-controls="profile1"><?php echo \Yii::t('app', 'Partner Preference');?></a></li>
                          <li role="presentation"><a href="#profile2" role="tab" id="profile-tab1" data-toggle="tab" aria-controls="profile1"><?php echo \Yii::t('app', 'Education Details');?></a></li>
                          <li role="presentation"><a href="#profile3" role="tab" id="profile-tab1" data-toggle="tab" aria-controls="profile1"><?php echo \Yii::t('app', 'Contact Details');?></a></li>
                       </ul>
                       <div id="myTabContent" class="tab-content">
                          <div role="tabpanel" class="tab-pane fade in active" id="home" aria-labelledby="home-tab">
                            <div class="basic_1">
                                <h3><?php echo \Yii::t('app', 'Basics & Lifestyle');?></h3>
                                <div class="col-md-6 basic_1-left">
                                  <table class="table_working_hours">
                                    <tbody>
                                        <tr class="opened_1">
                                            <td class="day_label"><?php echo \Yii::t('app', 'Name');?> :</td>
                                            <td class="day_value"><?= $profile->name?></td>
                                        </tr>
                                        <tr class="opened">
                                            <td class="day_label"><?php echo \Yii::t('app', 'Marital Status');?> :</td>
                                            <td class="day_value"><?= $profile->marital_status?></td>
                                        </tr>
                                        <tr class="opened">
                                            <td class="day_label"><?php echo \Yii::t('app', 'Body Type');?> :</td>
                                            <td class="day_value"><?php if(empty($profile->built)){
                                                    echo MESSAGE;
                                                }else{
                                                     echo $profile->built;   
                                                }?></td>
                                        </tr>
                                        <tr class="opened">
                                            <td class="day_label"><?php echo \Yii::t('app', 'Height');?> :</td>
                                            <td class="day_value">
                                                <?php if(empty($profile->height)){
                                                    echo MESSAGE;
                                                }else{
                                                     echo $profile->height.' ft';   
                                                }?>
                                            </td>
                                        </tr>
                                        <tr class="opened">
                                            <td class="day_label"><?php echo \Yii::t('app', 'Profile Created by');?> :</td>
                                            <td class="day_value closed"><span>
                                            <?php   
                                            if($profile->user->profile_for=='self'){
                                             echo $profile->user->profile_for;   
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
                                            <td class="day_label"><?php echo \Yii::t('app', 'Mother Tongue');?> :</td>
                                            <td class="day_value"><?= $profile->user->mother_tongue ?></td>
                                        </tr>
                                        <tr class="opened">
                                            <td class="day_label"><?php echo \Yii::t('app', 'Complexion');?> :</td>
                                            <td class="day_value"><?php if(empty($profile->complextion)){
                                                    echo MESSAGE;
                                                }else{
                                                     echo $profile->complextion;   
                                                }?></td>
                                        </tr>
                                        <tr class="opened">
                                            <td class="day_label"><?php echo \Yii::t('app', 'Weight');?> :</td>
                                            <td class="day_value">
                                            <?php if(empty($profile->weight)){
                                                    echo MESSAGE;
                                                }else{
                                                     echo $profile->weight.' kg.';   
                                                }?>    
                                            </td>
                                        </tr>
                                        <tr class="opened">
                                            <td class="day_label"><?php echo \Yii::t('app', 'Blood Group');?> :</td>
                                            <td class="day_value"><?php if(empty($profile->blood_group)){
                                                    echo MESSAGE;
                                                }else{
                                                     echo $profile->blood_group;   
                                                }?>    
                                            </td>
                                        </tr>
                                        <tr class="closed">
                                            <td class="day_label"><?php echo \Yii::t('app', 'Diet');?> :</td>
                                            <td class="day_value closed"><span><?php if(empty($profile->diet)){
                                                    echo MESSAGE;
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
                                <h3><?php echo \Yii::t('app', 'Religious / Social & Astro Background');?></h3>
                                <div class="col-md-6 basic_1-left">
                                  <table class="table_working_hours">
                                    <tbody>
                                        <tr class="opened">
                                            <td class="day_label"><?php echo \Yii::t('app', 'Time of Birth');?> :</td>
                                            <td class="day_value">
                                                <?php if(empty($profile->birthtime)){
                                                    echo MESSAGE;
                                                }else{
                                                     echo $profile->birthtime;   
                                                }?>
                                            </td>
                                        </tr>
                                        <tr class="opened">
                                            <td class="day_label"><?php echo \Yii::t('app', 'Caste');?> :</td>
                                            <td class="day_value">
                                            <?php if(empty($profile->caste)){
                                                    echo MESSAGE;
                                                }else{
                                                     echo $profile->myCaste->name;   
                                                }?></td>
                                        </tr>
                                        <tr class="opened">
                                            <td class="day_label"><?php echo \Yii::t('app', 'Date of Birth');?> :</td>
                                            <td class="day_value closed"><span>
                                            <?php if(empty($profile->date_of_birth)){
                                                    echo MESSAGE;
                                                }else{
                                                     echo $profile->date_of_birth;   
                                                }?>
                                            </span></td>
                                        </tr>
                                        <tr class="opened">
                                            <td class="day_label"><?php echo \Yii::t('app', 'Place of Birth');?> :</td>
                                            <td class="day_value closed"><span>
                                            <?php if(empty($profile->birthplace)){
                                                    echo MESSAGE;
                                                }else{
                                                     echo $profile->birthplace;   
                                                }?>
                                                    
                                                </span></td>
                                        </tr>
                                        <tr class="opened">
                                            <td class="day_label"><?php echo \Yii::t('app', 'Charan');?> :</td>
                                            <td class="day_value closed"><span>
                                            <?php if(empty($profile->charan)){
                                                    echo MESSAGE;
                                                }else{
                                                     echo $profile->charan;   
                                                }?>
                                                    
                                                </span></td>
                                        </tr>
                                        <tr class="opened">
                                            <td class="day_label"><?php echo \Yii::t('app', 'Nadi');?> :</td>
                                            <td class="day_value closed"><span>
                                            <?php if(empty($profile->nadi)){
                                                    echo MESSAGE;
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
                                            <td class="day_label"><?php echo \Yii::t('app', 'Religion');?> :</td>
                                            <td class="day_value">
                                            <?php if(empty($profile->religion)){
                                                    echo MESSAGE;
                                                }else{
                                                     echo $profile->religion;   
                                                }?>
                                            </td>
                                        </tr>
                                        <tr class="opened">
                                            <td class="day_label"><?php echo \Yii::t('app', 'Sub Caste');?> :</td>
                                            <td class="day_value">
                                            <?php if(empty($profile->sub_caste)){
                                                    echo MESSAGE;
                                                }else{
                                                     echo $profile->mySubCaste->name;   
                                                }?></td>
                                        </tr>
                                        <tr class="opened">
                                            <td class="day_label"><?php echo \Yii::t('app', 'Rashi');?> :</td>
                                            <td class="day_value"><?php if(empty($profile->rashi)){
                                                    echo MESSAGE;
                                                }else{
                                                     echo $profile->rashi;   
                                                }?></td>
                                        </tr>
                                        <tr class="opened">
                                            <td class="day_label"><?php echo \Yii::t('app', 'Nakshatra');?> :</td>
                                            <td class="day_value"><?php if(empty($profile->nakshatra)){
                                                    echo MESSAGE;
                                                }else{
                                                     echo $profile->nakshatra;   
                                                }?></td>
                                        </tr>
                                        <tr class="opened">
                                            <td class="day_label"><?php echo \Yii::t('app', 'Gan');?> :</td>
                                            <td class="day_value"><?php if(empty($profile->gan)){
                                                    echo MESSAGE;
                                                }else{
                                                     echo $profile->gan;   
                                                }?></td>
                                        </tr>
                                        <tr class="opened">
                                            <td class="day_label"><?php echo \Yii::t('app', 'Gotra');?> :</td>
                                            <td class="day_value"><?php if(empty($profile->gotra)){
                                                    echo MESSAGE;
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
                                <h3><?php echo \Yii::t('app', 'Education & Career');?></h3>
                                <div class="basic_1-left">
                                  <table class="table_working_hours">
                                    <tbody>
                                        <tr class="opened">
                                            <td class="day_label"><?php echo \Yii::t('app', 'Education');?>   :</td>
                                            <td class="day_value">
                                            <?php if(empty($profile->educations)){
                                                    echo MESSAGE;
                                                }else{
                                                     echo $profile->education;   
                                                }?>
                                        
                                                </td>
                                        </tr>
                                        <tr class="opened">

                                            <td class="day_label"><?php echo \Yii::t('app', 'Occupation Detail');?> :</td>
                                            <td class="day_value closed"><?php if(empty($profile->occupation)){
                                                    echo MESSAGE;
                                                }else{
                                                     echo $profile->occupation;   
                                                }?></td>
                                        </tr>

                                        <tr class="opened">
                                            <td class="day_label"><?php echo \Yii::t('app', 'Annual Income');?> :</td>
                                            <td class="day_value closed"><?php if(empty($profile->income)){
                                                    echo MESSAGE;
                                                }else{
                                                     echo $profile->income;   
                                                }?></td>
                                        </tr>
                                     </tbody>
                                  </table>
                                 </div>
                                 <div class="clearfix"> </div>
                            </div>
                            
                          </div>
                          <div role="tabpanel" class="tab-pane fade" id="profile" aria-labelledby="profile-tab">
                            <div class="basic_3">
                                <h4><?php echo \Yii::t('app', 'Family Details');?></h4>
                                <div class="basic_1 basic_2">
                                <h3><?php echo \Yii::t('app', 'Basics');?></h3>
                                <div class="">
                                <div class="basic_1-left">
                                  <table class="table_working_hours">
                                    <tbody>
                                        <tr class="opened">
                                            <td class="day_label"><?php echo \Yii::t('app', "Father's Name");?> :</td>
                                            <?php if(empty($profile->father)){ ?>
                                                <td class="day_value"><?= MESSAGE ?></td>
                                            <?php }else{?>
                                                <td class="day_value"><?= $profile->father ?></td>
                                            <?php }?>
                                        </tr>
                                        <tr class="opened">
                                            <td class="day_label"><?php echo \Yii::t('app', "Mother's Name");?> :</td>
                                            <?php if(empty($profile->mother)){ ?>
                                                <td class="day_value"><?= MESSAGE ?></td>
                                            <?php }else{?>
                                                <td class="day_value"><?= $profile->mother ?></td>
                                            <?php }?>
                                        </tr>
                                        <tr class="opened">
                                            <td class="day_label"><?php echo \Yii::t('app', 'No. of Brothers');?> :</td>
                                           <?php if(empty($profile->brothers)){ ?>
                                                <td class="day_value"><?= MESSAGE ?></td>
                                            <?php }else{?>
                                                <td class="day_value closed"><span><?= $profile->brothers ?></span></td>
                                            <?php }?>
                                        </tr>
                                        <tr class="opened">
                                            <td class="day_label"><?php echo \Yii::t('app', 'No. of Sisters');?> :</td>
                                            <?php if(empty($profile->sisters)){ ?>
                                                <td class="day_value"><?= MESSAGE ?></td>
                                            <?php }else{?>
                                                <td class="day_value closed"><span><?= $profile->sisters ?></span></td>
                                            <?php }?>
                                        </tr>
                                     </tbody>
                                  </table>
                                 </div>
                                 </div>
                                    
                               </div>
                            </div> 

                         </div>
                         <div role="tabpanel" class="tab-pane fade" id="profile1" aria-labelledby="profile-tab1">
                            <div class="basic_1 basic_2 basic_3">
                            <h4 ><?php echo \Yii::t('app', 'Partner Preference Details');?></h4>
                               <div class="basic_1-left">
                                  <table class="table_working_hours">
                                    <tbody>                            
                                        <tr class="opened">
                                            <td class="day_label"><?php echo \Yii::t('app', 'Age');?>   :</td>
                                            <td class="day_value">
                                            <?php            
                                            if(empty($profile->expected_min_age) && empty($profile->expected_max_age)){
                                                echo MESSAGE;
                                            }else{
                                                echo $profile->expected_min_age.' Yrs To '.$profile->expected_max_age.' Yrs';    
                                            }
                                            ?>
                                            </td>
                                        </tr>
                                        <tr class="opened">
                                            <td class="day_label"><?php echo \Yii::t('app', 'Height');?> :</td>
                                            <td class="day_value closed"> 
                                            <?php            
                                            if(empty($profile->expected_min_height) && empty($profile->expected_max_height) ){
                                                echo MESSAGE;
                                            }else{
                                                echo $profile->expected_min_height.' To '.$profile->expected_max_height;    
                                            }
                                            ?></td>
                                        </tr>
                                        <tr class="opened">
                                            <td class="day_label"><?php echo \Yii::t('app', 'Caste');?> :</td>
                                            <td class="day_value closed"><?php            
                                            if(empty($profile->expected_caste)){
                                                echo MESSAGE;
                                            }else{
                                                echo $profile->expectedCaste->name;   
                                            }
                                            ?></td>
                                        </tr>
                                        <tr class="opened">
                                            <td class="day_label"><?php echo \Yii::t('app', 'Sub Caste');?> :</td>
                                            <td class="day_value closed"><?php            
                                            if(empty($profile->expected_sub_caste)){
                                                echo MESSAGE;
                                            }else{
                                                echo $profile->expectedSubCaste->name;   
                                            }
                                            ?></td>
                                        </tr>
                                        <tr class="opened">
                                            <td class="day_label"><?php echo \Yii::t('app', 'Education');?> :</td>
                                            <td class="day_value closed"><?php            
                                            if(empty($profile->expected_education)){
                                                echo MESSAGE;
                                            }else{
                                                echo $profile->expected_education;  
                                            }
                                            ?></td>
                                        </tr>
                                        <tr class="opened">
                                            <td class="day_label"><?php echo \Yii::t('app', 'Occupation');?> :</td>
                                            <td class="day_value closed">
                                            <?php            
                                            if(empty($profile->expected_occupation)){
                                                echo MESSAGE;
                                            }else{
                                                echo $profile->expected_occupation;    
                                            }
                                            ?></td>
                                        </tr>
                                     </tbody>
                                  </table>
                                </div>
                             </div>
                            
                         </div>
                         <div role="tabpanel" class="tab-pane fade in" id="profile2" aria-labelledby="profile-tab">
                            <div class="basic_3">
                               <h4><?php echo \Yii::t('app', 'Education Details');?></h4>
                               <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                           
                                            <th><?php echo \Yii::t('app', 'Education Area');?></th>
                                            <th><?php echo \Yii::t('app', 'Education');?></th>
                                            <th><?php echo \Yii::t('app', 'Start Date');?></th>
                                            <th><?php echo \Yii::t('app', 'End Date');?></th>
                                            <th><?php echo \Yii::t('app', 'Institute');?></th>
                                            <th><?php echo \Yii::t('app', 'Result');?></th>
                                            <th><?php echo \Yii::t('app', 'Place');?></th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    if(sizeof($profile->educations)==0){
                                         ?>
                                         <tr>
                                              <td colspan="9" align="center"><?= MESSAGE ?></td>
                                         </tr>

                                         <?php   
                                        }else{
                                     foreach($profile->educations as $education) { 
                                        if(!empty($education->education_area) ) 
                                           {
                                    ?>    
                                        <tr>
                                          
                                           <td><?= $education->education_area;?></td>
                                           <td><?= $education->education ;?></td>
                                           <td><?= $education->start_date;?></td>
                                           <td><?= $education->end_date;?></td>
                                           <td><?= $education->institute;?></td>
                                           <td><?= $education->result;?></td>
                                           <td><?= $education->place;?></td>           
                                           
                                        </tr>
                                    <?php  
                                       
                                      }
                                    } 
                                    }?>     
                                    </tbody>
                               </table>
                            </div>
                         </div>
                         <div role="tabpanel" class="tab-pane fade in" id="profile3" aria-labelledby="profile-tab">
                            <div class="basic_3">
                                  <h4><?php echo \Yii::t('app', 'Contact Details');?></h4>                      
                               <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th><?php echo \Yii::t('app', 'Contact Person Name');?></th>
                                            <th><?php echo \Yii::t('app', 'Phone Number');?></th>
                                            <th><?php echo \Yii::t('app', 'Email');?></th>
                                            <th><?php echo \Yii::t('app', 'Description');?></th>
                                           
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    if(sizeof($profile->contacts)==0){
                                     ?>
                                        <tr>
                                              <td colspan="9" align="center"><?= MESSAGE ?></td>
                                         </tr>                                        
                                    <?php
                                     }else{
                                     foreach($profile->contacts as $contact){
                                    if(!empty($contact->name)) 
                                           { 
                                    ?>    
                                        <tr>
                                           <td><?= $contact->name;?></td>
                                           <td><?= $contact->phone;?></td>
                                           <td><?= $contact->email;?></td>
                                           <td><?= $contact->message;?></td>           
                                           
                                        </tr>
                                    <?php  
                                      }
                                    } 
                                    }?>     
                                    </tbody>                           
                               </table>
                            </div>
                         </div>
                       </div>
                    </div>
                </div>
            </div>

<!-- right side start -->
            <div class="col-md-4 profile_right">
                <div class="newsletter">
                   <?php echo Yii::$app->SearchById->welcome();?>
                </div>
                <div class="view_profile">
                    <h3><?php echo \Yii::t('app', 'View Similar Profiles');?></h3>
                    <?php       
                    foreach ($similars as $similar) {
                    ?>
                    <ul class="profile_item">
                      <a href="#">
                       <li class="profile_item-img">
                         <?php
                                if(empty($similar->profile_image)){
                                     if($similar->gender=='m'){
                                    ?>
                                    
                                    <img src="images/default.jpg" class="img-responsive" alt="default image>

                                    <?php }else{?>

                                    <img src="images/defaultb.jpeg" class="img-responsive" alt="default image">

                                    <?php   }
                                }else{ ?>

                                    <img src="<?= 'images/profile/'.$similar->profile_image?>" class="img-responsive" alt="default image>

                                <?php } ?>

                       </li>
                       <li class="profile_item-desc">
                          <h4><?php echo $similar->id;?></h4>
                          <p><?php echo $similar->marital_status;?></p>
                          <p><?php echo $similar->city;?></p>
                          <h5><a href="<?php echo Url::toRoute(['profile/view','id'=>$similar->id]);?>"><div class="vertical"><?php echo \Yii::t('app', 'View Full Profile');?></div>
                     </a></h5>
                       </li>
                       <div class="clearfix"> 
                       </div>
                      </a>
                   </ul>
                    <?php
                    }
                    ?>     
                </div>
                <div class="clearfix"> </div>
            </div>
             
            <div class="clearfix"> </div>
            </div>
        </div>
    </div>
</div>
<div id="printarea" class="hidden-xs hidden-lg hidden-sm hidden-md">
    <div class="col-md-12 profile_left">
                <h2 ><?php echo \Yii::t('app', 'Name');?> : <?= $profile->name?></h2>
                <div class="col_3">
                    <div class="col-sm-4 row_2">
                        <?php
                        if(empty($profile->profile_image)){
                             if($profile->gender=='m'){
                            ?>
                            
                            <img src="images/default.jpg" width="250px" height="150px" class="img-responsive">

                            <?php }else{?>

                            <img src="images/defaultb.jpeg" width="250px" height="150px" class="img-responsive">

                            <?php   }
                        }else{ ?>

                            <img src="<?= 'images/profile/'.$profile->profile_image?>" width="250px" height="150px">

                        <?php } ?>  
                    </div>
                    <div class="col-sm-8 row_1">
                        <table class="table_working_hours">
                            <tbody>
                                <tr class="opened_1">
                                    <td class="day_label"><?php echo \Yii::t('app', 'City');?> :</td>
                                    <td class="day_value"><?= $profile->city?></td>
                                </tr>
                                <tr class="opened">
                                    <td class="day_label"><?php echo \Yii::t('app', 'State');?></td>
                                    <td class="day_value"><?= $profile->state?></td>
                                </tr>
                                <tr class="opened">
                                    <td class="day_label"><?php echo \Yii::t('app', 'Country');?></td>
                                    <td class="day_value"><?= $profile->country?></td>
                                </tr>
                                <tr class="opened">
                                    <td class="day_label"><?php echo \Yii::t('app', 'Mobile Number');?> :</td>
                                    <td class="day_value"><?= $profile->mobile ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="clearfix"> </div>
                </div>
                <div class="col_4">
                    <div >
                      
                       <div >
                          <div >
                            <div class="basic_1">
                                <h3><?php echo \Yii::t('app', 'Basics & Lifestyle');?></h3>
                                <div class="col-md-6 basic_1-left">
                                  <table class="table_working_hours">
                                    <tbody>
                                        <tr class="opened_1">
                                            <td class="day_label"><?php echo \Yii::t('app', 'Name');?> :</td>
                                            <td class="day_value"><?= $profile->name?></td>
                                        </tr>
                                        <tr class="opened">
                                            <td class="day_label"><?php echo \Yii::t('app', 'Marital Status');?> :</td>
                                            <td class="day_value"><?= $profile->marital_status?></td>
                                        </tr>
                                        <tr class="opened">
                                            <td class="day_label"><?php echo \Yii::t('app', 'Body Type');?> :</td>
                                            <td class="day_value"><?php if(empty($profile->built)){
                                                    echo MESSAGE;
                                                }else{
                                                     echo $profile->built;   
                                                }?></td>
                                        </tr>
                                        <tr class="opened">
                                            <td class="day_label"><?php echo \Yii::t('app', 'Height');?> :</td>
                                            <td class="day_value">
                                                <?php if(empty($profile->height)){
                                                    echo MESSAGE;
                                                }else{
                                                     echo $profile->height.' ft';   
                                                }?>
                                            </td>
                                        </tr>
                                        <tr class="opened">
                                            <td class="day_label"><?php echo \Yii::t('app', 'Profile Created by');?> :</td>
                                            <td class="day_value closed"><span>
                                            <?php   
                                            if($profile->user->profile_for=='self'){
                                             echo $profile->user->profile_for;   
                                            }else{
                                                echo 'Family/Relatives';
                                            }?>
                                            </span></td>
                                        </tr>
                                    <!-- </tbody>
                                  </table>
                                 </div>
                                 <div>
                                  <table class="table_working_hours">
                                    <tbody> -->
                                        <tr class="opened">
                                            <td class="day_label"><?php echo \Yii::t('app', 'Mother Tongue');?> :</td>
                                            <td class="day_value"><?= $profile->user->mother_tongue ?></td>
                                        </tr>
                                        <tr class="opened">
                                            <td class="day_label"><?php echo \Yii::t('app', 'Complexion');?> :</td>
                                            <td class="day_value"><?php if(empty($profile->complextion)){
                                                    echo MESSAGE;
                                                }else{
                                                     echo $profile->complextion;   
                                                }?></td>
                                        </tr>
                                        <tr class="opened">
                                            <td class="day_label"><?php echo \Yii::t('app', 'Weight');?> :</td>
                                            <td class="day_value">
                                            <?php if(empty($profile->weight)){
                                                    echo MESSAGE;
                                                }else{
                                                     echo $profile->weight.' kg.';   
                                                }?>    
                                            </td>
                                        </tr>
                                        <tr class="opened">
                                            <td class="day_label"><?php echo \Yii::t('app', 'Blood Group');?> :</td>
                                            <td class="day_value"><?php if(empty($profile->blood_group)){
                                                    echo MESSAGE;
                                                }else{
                                                     echo $profile->blood_group;   
                                                }?>    
                                            </td>
                                        </tr>
                                        <tr class="closed">
                                            <td class="day_label"><?php echo \Yii::t('app', 'Diet');?> :</td>
                                            <td class="day_value closed"><span><?php if(empty($profile->diet)){
                                                    echo MESSAGE;
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
                                <h3><?php echo \Yii::t('app', 'Religious / Social & Astro Background');?></h3>
                                <div class="col-md-6 basic_1-left">
                                  <table class="table_working_hours">
                                    <tbody>
                                        <tr class="opened">
                                            <td class="day_label"><?php echo \Yii::t('app', 'Time of Birth');?> :</td>
                                            <td class="day_value">
                                                <?php if(empty($profile->birthtime)){
                                                    echo MESSAGE;
                                                }else{
                                                     echo $profile->birthtime;   
                                                }?>
                                            </td>
                                        </tr>
                                        <tr class="opened">
                                            <td class="day_label"><?php echo \Yii::t('app', 'Caste');?> :</td>
                                            <td class="day_value">
                                            <?php if(empty($profile->caste)){
                                                    echo MESSAGE;
                                                }else{
                                                     echo $profile->myCaste->name;   
                                                }?></td>
                                        </tr>
                                        <tr class="opened">
                                            <td class="day_label"><?php echo \Yii::t('app', 'Date of Birth');?> :</td>
                                            <td class="day_value closed"><span>
                                            <?php if(empty($profile->date_of_birth)){
                                                    echo MESSAGE;
                                                }else{
                                                     echo $profile->date_of_birth;   
                                                }?>
                                            </span></td>
                                        </tr>
                                        <tr class="opened">
                                            <td class="day_label"><?php echo \Yii::t('app', 'Place of Birth');?> :</td>
                                            <td class="day_value closed"><span>
                                            <?php if(empty($profile->birthplace)){
                                                    echo MESSAGE;
                                                }else{
                                                     echo $profile->birthplace;   
                                                }?>
                                                    
                                                </span></td>
                                        </tr>
                                        <tr class="opened">
                                            <td class="day_label"><?php echo \Yii::t('app', 'Charan');?> :</td>
                                            <td class="day_value closed"><span>
                                            <?php if(empty($profile->charan)){
                                                    echo MESSAGE;
                                                }else{
                                                     echo $profile->charan;   
                                                }?>
                                                    
                                                </span></td>
                                        </tr>
                                        <tr class="opened">
                                            <td class="day_label"><?php echo \Yii::t('app', 'Nadi');?> :</td>
                                            <td class="day_value closed"><span>
                                            <?php if(empty($profile->nadi)){
                                                    echo MESSAGE;
                                                }else{
                                                     echo $profile->nadi;   
                                                }?>
                                                    
                                                </span></td>
                                        </tr>
                                     <!-- </tbody>
                                  </table>
                                 </div>
                                 <div class="col-md-6 basic_1-left">
                                  <table class="table_working_hours">
                                    <tbody> -->
                                        <tr class="opened_1">
                                            <td class="day_label"><?php echo \Yii::t('app', 'Religion');?> :</td>
                                            <td class="day_value">
                                            <?php if(empty($profile->religion)){
                                                    echo MESSAGE;
                                                }else{
                                                     echo $profile->religion;   
                                                }?>
                                            </td>
                                        </tr>
                                        <tr class="opened">
                                            <td class="day_label"><?php echo \Yii::t('app', 'Sub Caste');?> :</td>
                                            <td class="day_value">
                                            <?php if(empty($profile->sub_caste)){
                                                    echo MESSAGE;
                                                }else{
                                                     echo $profile->mySubCaste->name;   
                                                }?></td>
                                        </tr>
                                        <tr class="opened">
                                            <td class="day_label"><?php echo \Yii::t('app', 'Rashi');?> :</td>
                                            <td class="day_value"><?php if(empty($profile->rashi)){
                                                    echo MESSAGE;
                                                }else{
                                                     echo $profile->rashi;   
                                                }?></td>
                                        </tr>
                                        <tr class="opened">
                                            <td class="day_label"><?php echo \Yii::t('app', 'Nakshatra');?> :</td>
                                            <td class="day_value"><?php if(empty($profile->nakshatra)){
                                                    echo MESSAGE;
                                                }else{
                                                     echo $profile->nakshatra;   
                                                }?></td>
                                        </tr>
                                        <tr class="opened">
                                            <td class="day_label"><?php echo \Yii::t('app', 'Gan');?> :</td>
                                            <td class="day_value"><?php if(empty($profile->gan)){
                                                    echo MESSAGE;
                                                }else{
                                                     echo $profile->gan;   
                                                }?></td>
                                        </tr>
                                        <tr class="opened">
                                            <td class="day_label"><?php echo \Yii::t('app', 'Gotra');?> :</td>
                                            <td class="day_value"><?php if(empty($profile->gotra)){
                                                    echo MESSAGE;
                                                }else{
                                                     echo $profile->gotra;   
                                                }?></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <!-- </div>
                                <div class="clearfix"> </div> -->
                            </div>
                            <div class="basic_1 basic_2">
                                <h3><?php echo \Yii::t('app', 'Education & Career');?></h3>
                                <div class="basic_1-left">
                                  <table class="table_working_hours">
                                    <tbody>
                                        <tr class="opened">
                                            <td class="day_label"><?php echo \Yii::t('app', 'Education');?>   :</td>
                                            <td class="day_value">
                                            <?php if(empty($profile->educations)){
                                                    echo MESSAGE;
                                                }else{
                                                     echo $profile->education;   
                                                }?>
                                        
                                                </td>
                                        </tr>
                                        <tr class="opened">

                                            <td class="day_label"><?php echo \Yii::t('app', 'Occupation Detail');?> :</td>
                                            <td class="day_value closed"><?php if(empty($profile->occupation)){
                                                    echo MESSAGE;
                                                }else{
                                                     echo $profile->occupation;   
                                                }?></td>
                                        </tr>

                                        <tr class="opened">
                                            <td class="day_label"><?php echo \Yii::t('app', 'Annual Income');?> :</td>
                                            <td class="day_value closed"><?php if(empty($profile->income)){
                                                    echo MESSAGE;
                                                }else{
                                                     echo $profile->income;   
                                                }?></td>
                                        </tr>
                                     </tbody>
                                  </table>
                                 </div>
                                 <div class="clearfix"> </div>
                            </div>
                            
                          </div>
                          <div >
                            <div class="basic_3 basic_1">
                                <h3><?php echo \Yii::t('app', 'Family Details');?></h3>
                                <div class="basic_1 basic_2">
                                <!-- <h3><?php //echo \Yii::t('app', 'Basics');?></h3> -->
                                <div class="">
                                <div class="basic_1-left">
                                  <table class="table_working_hours">
                                    <tbody>
                                        <tr class="opened">
                                            <td class="day_label"><?php echo \Yii::t('app', "Father's Name");?> :</td>
                                            <?php if(empty($profile->father)){ ?>
                                                <td class="day_value"><?= MESSAGE ?></td>
                                            <?php }else{?>
                                                <td class="day_value"><?= $profile->father ?></td>
                                            <?php }?>
                                        </tr>
                                        <tr class="opened">
                                            <td class="day_label"><?php echo \Yii::t('app', "Mother's Name");?> :</td>
                                           <?php if(empty($profile->mother)){ ?>
                                                <td class="day_value"><?= MESSAGE ?></td>
                                            <?php }else{?>
                                                <td class="day_value"><?= $profile->mother ?></td>
                                            <?php }?>
                                        </tr>
                                        <tr class="opened">
                                            <td class="day_label"><?php echo \Yii::t('app', 'No. of Brothers');?> :</td>
                                            <?php if(empty($profile->brothers)){ ?>
                                                <td class="day_value"><?= MESSAGE ?></td>
                                            <?php }else{?>
                                                <td class="day_value closed"><span><?= $profile->brothers ?></span></td>
                                            <?php }?>
                                        </tr>
                                        <tr class="opened">
                                            <td class="day_label"><?php echo \Yii::t('app', 'No. of Sisters');?> :</td>
                                            <?php if(empty($profile->sisters)){ ?>
                                                <td class="day_value"><?= MESSAGE ?></td>
                                            <?php }else{?>
                                                <td class="day_value closed"><span><?= $profile->sisters ?></span></td>
                                            <?php }?>
                                        </tr>
                                     </tbody>
                                  </table>
                                 </div>
                                 </div>
                                    
                               </div>
                            </div> 

                         </div>
                         <div >
                            <div class="basic_1 basic_2 basic_3">
                            <h3><?php echo \Yii::t('app', 'Partner Preference Details');?></h3>
                               <div class="basic_1-left">
                                  <table class="table_working_hours">
                                    <tbody>                            
                                        <tr class="opened">
                                            <td class="day_label"><?php echo \Yii::t('app', 'Age');?>   :</td>
                                            <td class="day_value">
                                            <?php            
                                            if(empty($profile->expected_min_age) && empty($profile->expected_max_age)){
                                                echo MESSAGE;
                                            }else{
                                                echo $profile->expected_min_age.' Yrs To '.$profile->expected_max_age.' Yrs';    
                                            }
                                            ?>
                                            </td>
                                        </tr>
                                        <tr class="opened">
                                            <td class="day_label"><?php echo \Yii::t('app', 'Height');?> :</td>
                                            <td class="day_value closed"> 
                                            <?php            
                                            if(empty($profile->expected_min_height) && empty($profile->expected_max_height)){
                                                echo MESSAGE;
                                            }else{
                                                echo $profile->expected_min_height.' To '.$profile->expected_max_height;    
                                            }
                                            ?></td>
                                        </tr>
                                        <tr class="opened">
                                            <td class="day_label"><?php echo \Yii::t('app', 'Caste');?> :</td>
                                            <td class="day_value closed"><?php            
                                            if(empty($profile->expected_caste)){
                                                echo MESSAGE;
                                            }else{
                                                echo $profile->expectedCaste->name;   
                                            }
                                            ?></td>
                                        </tr>
                                        <tr class="opened">
                                            <td class="day_label"><?php echo \Yii::t('app', 'Sub Caste');?> :</td>
                                            <td class="day_value closed"><?php            
                                            if(empty($profile->expected_sub_caste)){
                                                echo MESSAGE;
                                            }else{
                                                echo $profile->expectedSubCaste->name;   
                                            }
                                            ?></td>
                                        </tr>
                                        <tr class="opened">
                                            <td class="day_label"><?php echo \Yii::t('app', 'Education');?> :</td>
                                            <td class="day_value closed"><?php            
                                            if(empty($profile->expected_education)){
                                                echo MESSAGE;
                                            }else{
                                                echo $profile->expected_education;  
                                            }
                                            ?></td>
                                        </tr>
                                        <tr class="opened">
                                            <td class="day_label"><?php echo \Yii::t('app', 'Occupation');?> :</td>
                                            <td class="day_value closed">
                                            <?php            
                                            if(empty($profile->expected_occupation)){
                                                echo MESSAGE;
                                            }else{
                                                echo $profile->expected_occupation;    
                                            }
                                            ?></td>
                                        </tr>
                                     </tbody>
                                  </table>
                                </div>
                             </div>
                            
                         </div>
                         <div >
                            <div class="basic_3 basic_1">
                               <h3><?php echo \Yii::t('app', 'Education Details');?></h3>
                               <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                           
                                            <th><?php echo \Yii::t('app', 'Education Area');?></th>
                                            <th><?php echo \Yii::t('app', 'Education');?></th>
                                            <th><?php echo \Yii::t('app', 'Start Date');?></th>
                                            <th><?php echo \Yii::t('app', 'End Date');?></th>
                                            <th><?php echo \Yii::t('app', 'Institute');?></th>
                                            <th><?php echo \Yii::t('app', 'Result');?></th>
                                            <th><?php echo \Yii::t('app', 'Place');?></th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach($profile->educations as $education) { 
                                    ?>    
                                        <tr>
                                          
                                           <td><?= $education->education_area;?></td>
                                           <td><?= $education->education ;?></td>
                                           <td><?= $education->start_date;?></td>
                                           <td><?= $education->end_date;?></td>
                                           <td><?= $education->institute;?></td>
                                           <td><?= $education->result;?></td>
                                           <td><?= $education->place;?></td>           
                                           
                                        </tr>
                                    <?php  
                                       
                                      
                                    } ?>     
                                    </tbody>
                               </table>
                            </div>
                         </div>
                         <div >
                            <div class="basic_3 basic_1">
                                  <h3><?php echo \Yii::t('app', 'Contact Details');?></h3>                      
                               <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th><?php echo \Yii::t('app', 'Contact Person Name');?></th>
                                            <th><?php echo \Yii::t('app', 'Phone Number');?></th>
                                            <th><?php echo \Yii::t('app', 'Email');?></th>
                                            <th><?php echo \Yii::t('app', 'Description');?></th>
                                           
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach($profile->contacts as $contact){ 
                                    ?>    
                                        <tr>
                                           <td><?= $contact->name;?></td>
                                           <td><?= $contact->phone;?></td>
                                           <td><?= $contact->email;?></td>
                                           <td><?= $contact->message;?></td>           
                                           
                                        </tr>
                                    <?php  
                                      
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
<script type="text/javascript">
$(window).load(function() {
  $('.flexslider').flexslider({
    animation: "slide",
    controlNav: "thumbnails"
  });
});    
</script>
<script type="text/javascript">
function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}
</script>