<style type="text/css">
    .table>table, .table th, .table td {
    border: 2px solid black;
}
table {
    border-collapse: collapse;
}
</style>
<?php

use yii\helpers\Html;
use frontend\components\SearchById;
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
            
           <div class="profile">
             <div class="col-md-12 profile_left" style="width :100%;">
                <h2 style="padding:10px; margin:5px;"><?php echo \Yii::t('app', 'Name');?> : <?= $profile->name?></h2>
                <div class="col_3">
                    <div class="col-sm-4 col-md-4 row_2" style="width:40%;float:left;">
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
                    <div class="col-sm-8 col-md-8 row_1" style="width:60%;float:left;">
                        <table class="table_working_hours" cellpadding="6" cellspacing="4">
                            <tbody>
                                <tr class="opened_1">
                                    <td class="day_label"><?php echo \Yii::t('app', 'City');?> </td>
                                    <td class="day_value"> : <?= $profile->city?></td>
                                </tr>
                                <tr class="opened">
                                    <td class="day_label"><?php echo \Yii::t('app', 'State');?></td>
                                    <td class="day_value"> : <?= $profile->state?></td>
                                </tr>
                                <tr class="opened">
                                    <td class="day_label"><?php echo \Yii::t('app', 'Country');?></td>
                                    <td class="day_value"> : <?= $profile->country?></td>
                                </tr>
                                <tr class="opened">
                                    <td class="day_label"><?php echo \Yii::t('app', 'Mobile Number');?></td>
                                    <td class="day_value"> : <?= $profile->mobile ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="clearfix"> </div>
                </div>

                <div class="col_4">
                    <div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
                       
                       <div id="myTabContent" class="tab-content">
                          <div role="tabpanel" class="tab-pane fade in active" id="home" aria-labelledby="home-tab">
                            <div class="basic_3" style="width:100%;>
                            <div class="clearfix"> </div>
                            <div class="clearfix"> &nbsp;</div>
                                <h3><?php echo \Yii::t('app', 'Basics & Lifestyle');?></h3>
                                <div class="col-md-6 basic_1-left" style="width:40%;float:left">
                                  <table class="table_working_hours" cellpadding="6" cellspacing="4">
                                    <tbody>
                                        <tr class="opened_1">
                                            <td class="day_label"><?php echo \Yii::t('app', 'Name');?> </td>
                                            <td class="day_value"> : <?= $profile->name?></td>
                                        </tr>
                                        <tr class="opened">
                                            <td class="day_label"><?php echo \Yii::t('app', 'Marital Status');?> </td>
                                            <td class="day_value"> : <?= $profile->marital_status?></td>
                                        </tr>
                                        <tr class="opened">
                                            <td class="day_label"><?php echo \Yii::t('app', 'Body Type');?></td>
                                            <td class="day_value"> : <?php if($profile->built==''){
                                                    echo "Not Mentioned";
                                                }else{
                                                     echo $profile->built;   
                                                }?></td>
                                        </tr>
                                        <tr class="opened">
                                            <td class="day_label"><?php echo \Yii::t('app', 'Height');?></td>
                                            <td class="day_value"> : 
                                                <?php if($profile->height==''){
                                                    echo "Not Mentioned";
                                                }else{
                                                     echo $profile->height.' ft';   
                                                }?>
                                            </td>
                                        </tr>
                                        <tr class="opened">
                                            <td class="day_label"><?php echo \Yii::t('app', 'Profile Created by');?></td>
                                            <td class="day_value closed"> : 
                                            <?php   
                                            if($profile->user->profile_for=='self'){
                                             echo $profile->user->profile_for;   
                                            }else{
                                                echo 'Family/Relatives';
                                            }?>
                                            </td>
                                        </tr>
                                    </tbody>
                                  </table>
                                 </div>
                                 <div class="col-md-6 basic_1-left" style="width:60%;float:left">
                                  <table class="table_working_hours" cellpadding="6" cellspacing="4">
                                    <tbody>
                                        <tr class="opened">
                                            <td class="day_label"><?php echo \Yii::t('app', 'Mother Tongue');?></td>
                                            <td class="day_value"> : <?= $profile->user->mother_tongue ?></td>
                                        </tr>
                                        <tr class="opened">
                                            <td class="day_label"><?php echo \Yii::t('app', 'Complexion');?></td>
                                            <td class="day_value"> : <?php if($profile->complextion==''){
                                                    echo "Not Mentioned";
                                                }else{
                                                     echo $profile->complextion;   
                                                }?></td>
                                        </tr>
                                        <tr class="opened">
                                            <td class="day_label"><?php echo \Yii::t('app', 'Weight');?></td>
                                            <td class="day_value"> : 
                                            <?php if($profile->weight==''){
                                                    echo "Not Mentioned";
                                                }else{
                                                     echo $profile->weight.' kg.';   
                                                }?>    
                                            </td>
                                        </tr>
                                        <tr class="opened">
                                            <td class="day_label"><?php echo \Yii::t('app', 'Blood Group');?></td>
                                            <td class="day_value"> : <?php if($profile->blood_group==''){
                                                    echo "Not Mentioned";
                                                }else{
                                                     echo $profile->blood_group;   
                                                }?>    
                                            </td>
                                        </tr>
                                        <tr class="closed">
                                            <td class="day_label"><?php echo \Yii::t('app', 'Diet');?></td>
                                            <td class="day_value closed"> : <span><?php if($profile->diet==''){
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
                            <div class="basic_3">
                            <div class="clearfix"> &nbsp;</div>
                                <h3><?php echo \Yii::t('app', 'Religious / Social & Astro Background');?></h3>
                                <div class="col-md-6 basic_1-left" style="width:40%;float:left">
                                  <table class="table_working_hours" cellpadding="6" cellspacing="4">
                                    <tbody>
                                        <tr class="opened">
                                            <td class="day_label"><?php echo \Yii::t('app', 'Time of Birth');?></td>
                                            <td class="day_value"> : 
                                                <?php if($profile->birthtime==''){
                                                    echo "Not Mentioned";
                                                }else{
                                                     echo $profile->birthtime;   
                                                }?>
                                            </td>
                                        </tr>
                                        <tr class="opened">
                                            <td class="day_label"><?php echo \Yii::t('app', 'Caste');?></td>
                                            <td class="day_value"> : 
                                            <?php if($profile->caste==''){
                                                    echo "Not Mentioned";
                                                }else{
                                                     echo $profile->caste;   
                                                }?></td>
                                        </tr>
                                        <tr class="opened">
                                            <td class="day_label"><?php echo \Yii::t('app', 'Date of Birth');?></td>
                                            <td class="day_value closed"> : <span>
                                            <?php if($profile->date_of_birth==''){
                                                    echo "Not Mentioned";
                                                }else{
                                                     echo $profile->date_of_birth;   
                                                }?>
                                            </span></td>
                                        </tr>
                                        <tr class="opened">
                                            <td class="day_label"><?php echo \Yii::t('app', 'Place of Birth');?></td>
                                            <td class="day_value closed"> : <span>
                                            <?php if($profile->birthplace==''){
                                                    echo "Not Mentioned";
                                                }else{
                                                     echo $profile->birthplace;   
                                                }?>
                                                    
                                                </span></td>
                                        </tr>
                                        <tr class="opened">
                                            <td class="day_label"><?php echo \Yii::t('app', 'Charan');?></td>
                                            <td class="day_value closed"> : <span>
                                            <?php if($profile->charan==''){
                                                    echo "Not Mentioned";
                                                }else{
                                                     echo $profile->charan;   
                                                }?>
                                                    
                                                </span></td>
                                        </tr>
                                        <tr class="opened">
                                            <td class="day_label"><?php echo \Yii::t('app', 'Nadi');?></td>
                                            <td class="day_value closed"> : <span>
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
                                 <div class="col-md-6 basic_1-left" style="width:60%;float:left">
                                  <table class="table_working_hours" cellpadding="6" cellspacing="4">
                                    <tbody>
                                        <tr class="opened_1">
                                            <td class="day_label"><?php echo \Yii::t('app', 'Religion');?></td>
                                            <td class="day_value"> : 
                                            <?php if($profile->religion==''){
                                                    echo "Not Mentioned";
                                                }else{
                                                     echo $profile->religion;   
                                                }?>
                                            </td>
                                        </tr>
                                        <tr class="opened">
                                            <td class="day_label"><?php echo \Yii::t('app', 'Sub Caste');?></td>
                                            <td class="day_value"> : 
                                            <?php if($profile->sub_caste==''){
                                                    echo "Not Mentioned";
                                                }else{
                                                     echo $profile->sub_caste;   
                                                }?></td>
                                        </tr>
                                        <tr class="opened">
                                            <td class="day_label"><?php echo \Yii::t('app', 'Rashi');?></td>
                                            <td class="day_value"> : <?php if($profile->rashi==''){
                                                    echo "Not Mentioned";
                                                }else{
                                                     echo $profile->rashi;   
                                                }?></td>
                                        </tr>
                                        <tr class="opened">
                                            <td class="day_label"><?php echo \Yii::t('app', 'Nakshatra');?></td>
                                            <td class="day_value"> : <?php if($profile->nakshatra==''){
                                                    echo "Not Mentioned";
                                                }else{
                                                     echo $profile->nakshatra;   
                                                }?></td>
                                        </tr>
                                        <tr class="opened">
                                            <td class="day_label"><?php echo \Yii::t('app', 'Gan');?></td>
                                            <td class="day_value"> : <?php if($profile->gan==''){
                                                    echo "Not Mentioned";
                                                }else{
                                                     echo $profile->gan;   
                                                }?></td>
                                        </tr>
                                        <tr class="opened">
                                            <td class="day_label"><?php echo \Yii::t('app', 'Gotra');?></td>
                                            <td class="day_value"> : <?php if($profile->gotra==''){
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
                            <div class="basic_1 basic_2 basic_3">
                            <div class="clearfix"> &nbsp;</div>
                                <h3><?php echo \Yii::t('app', 'Education & Career');?></h3>
                                <div class="basic_1-left">
                                  <table class="table_working_hours" cellpadding="6" cellspacing="4">
                                    <tbody>
                                        <tr class="opened">
                                            <td class="day_label"><?php echo \Yii::t('app', 'Education');?></td>
                                            <td class="day_value">  : 
                                            <?php if($profile->educations==''){
                                                    echo "Not Mentioned";
                                                }else{
                                                     echo $profile->education;   
                                                }?>
                                        
                                                </td>
                                        </tr>
                                        <tr class="opened">

                                            <td class="day_label"><?php echo \Yii::t('app', 'Occupation Detail');?></td>
                                            <td class="day_value closed"> : <?php if($profile->occupation==''){
                                                    echo "Not Mentioned";
                                                }else{
                                                     echo $profile->occupation;   
                                                }?></td>
                                        </tr>

                                        <tr class="opened">
                                            <td class="day_label"><?php echo \Yii::t('app', 'Annual Income');?></td>
                                            <td class="day_value closed"> : <?php if($profile->income==''){
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
                           <!--  <div class="form-group">
                                <a class="btn btn-primary btn_1" href="<?php //echo Url::toRoute(['profile/createpdf','id'=>$profile->id])?>"><?php //echo \Yii::t('app', 'Print');?></a>
                            </div> -->
                          </div>
                          <div >
                          <div class="clearfix"> &nbsp;</div>
                            <div class="basic_3">
                                <h3><?php echo \Yii::t('app', 'Family Details');?></h3>
                                <div class="basic_1 basic_2">
                               
                                <div class="">
                                <div class="basic_1-left">
                                  <table class="table_working_hours" cellpadding="6" cellspacing="4">
                                    <tbody>
                                        <tr class="opened">
                                            <td class="day_label"><?php echo \Yii::t('app', "Father's Name");?></td>
                                            <td class="day_value"> : <?= $profile->father ?></td>
                                        </tr>
                                        <tr class="opened">
                                            <td class="day_label"><?php echo \Yii::t('app', "Mother's Name");?></td>
                                            <td class="day_value"> : <?= $profile->mother ?></td>
                                        </tr>
                                        <tr class="opened">
                                            <td class="day_label"><?php echo \Yii::t('app', 'No. of Brothers');?></td>
                                            <td class="day_value closed"> : <span><?= $profile->brothers ?></span></td>
                                        </tr>
                                        <tr class="opened">
                                            <td class="day_label"><?php echo \Yii::t('app', 'No. of Sisters');?></td>
                                            <td class="day_value closed"> : <span><?= $profile->sisters ?></span></td>
                                        </tr>
                                     </tbody>
                                  </table>
                                 </div>
                                 </div>
                                    
                               </div>
                            </div> 

                         </div>

                         <div>
                         <div class="clearfix"> &nbsp;</div>
                            <div class="basic_1 basic_2 basic_3">
                            <h3><?php echo \Yii::t('app', 'Partner Preference Details');?></h3>
                               <div class="basic_1-left">
                                  <table class="table_working_hours" cellpadding="6" cellspacing="4">
                                    <tbody>                            
                                        <tr class="opened">
                                            <td class="day_label"><?php echo \Yii::t('app', 'Age');?></td>
                                            <td class="day_value">  : 
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
                                            <td class="day_label"><?php echo \Yii::t('app', 'Height');?></td>
                                            <td class="day_value closed">  : 
                                            <?php            
                                            if($profile->expected_min_height =="" && $profile->expected_max_height ==""){
                                                echo "Not Mentioned";
                                            }else{
                                                echo $profile->expected_min_height.' To '.$profile->expected_max_height;    
                                            }
                                            ?></td>
                                        </tr>
                                        <tr class="opened">
                                            <td class="day_label"><?php echo \Yii::t('app', 'Caste');?></td>
                                            <td class="day_value closed"> : <?php            
                                            if($profile->expected_caste =="" && $profile->expected_caste ==""){
                                                echo "Not Mentioned";
                                            }else{
                                                echo $profile->expected_caste;   
                                            }
                                            ?></td>
                                        </tr>
                                        <tr class="opened">
                                            <td class="day_label"><?php echo \Yii::t('app', 'Education');?></td>
                                            <td class="day_value closed"> : <?php            
                                            if($profile->expected_education =="" && $profile->expected_education ==""){
                                                echo "Not Mentioned";
                                            }else{
                                                echo $profile->expected_education;  
                                            }
                                            ?></td>
                                        </tr>
                                        <tr class="opened">
                                            <td class="day_label"><?php echo \Yii::t('app', 'Occupation');?></td>
                                            <td class="day_value closed"> : 
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
                            
                         </div>
                         <div>
                         <div class="clearfix"> &nbsp;</div>
                            <div class="basic_3">
                               <h3><?php echo \Yii::t('app', 'Education Details');?></h3>
                               <table class="table table-bordered table-striped" cellpadding="6" cellspacing="4">
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
                         <div>
                         <div class="clearfix"> &nbsp;</div>
                            <div class="basic_3">
                                  <h3><?php echo \Yii::t('app', 'Contact Details');?></h3>                      
    <table class="table table-bordered table-striped" cellpadding="6" cellspacing="4" ">
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

<!-- right side start -->
           
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
