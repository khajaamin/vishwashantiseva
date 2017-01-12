<?php
use yii\helpers\Url;
use common\models\PaidProfiles;
?>

                

                <?php
                                $j=0;
                             foreach ($records as $record) {

                             $paidprofiles=PaidProfiles::find()->where(['paid_for_profile_id'=>$record->paid_for_profile_id])->with('profiles')->one();
                        //$paidprofiles->profiles->name;exit;


                                $j++;  
                            ?>

                            <div class="col-sm-6">
                              <ul class="profile_item">
                                <a href="#">
                                 <li class="profile_item-img">
                                    <img style="height:70px;" src="images/profile/<?php echo $paidprofiles->profiles->profile_image;?>" class="img-responsive" alt=""/>
                                 </li>
                                 <li class="profile_item-desc">
                                    <h4><?php echo $record->paid_for_profile_id;?></h4>
                                    <p><?php echo $paidprofiles->profilesmarital_status;?></p>
                                    <h5><a href="<?php echo Url::toRoute(['profile/view','id'=>$record->paid_for_profile_id]);?>"><div class="vertical"><?php echo \Yii::t('app', 'View Full Profile');?></div></a></h5>
                                 </li>
                                 <div class="clearfix"> </div>
                                </a>
                              </ul>
                            </div>    
                                
                            <?php  
                                } 
                            ?>

                            <table class="table table-bordered table-striped">
                        <thead>
                             <tr>
                                <th><?php echo \Yii::t('app', 'Sr.No.');?></th>
                                <th><?php echo \Yii::t('app', 'Paid For Profile Id');?></th>
                                <th><?php echo \Yii::t('app', 'Date');?></th>
                             <!--<th>--><?php //echo \Yii::t('app', 'Status');?><!--</th>--> 
                            </tr>
                        </thead>
                        <tbody>
                                
                            <?php
                                $j=0;
                             foreach ($records as $record) {

                             // $paidprofiles=PaidProfiles::find()->where(['paid_for_profile_id'=>$record->paid_for_profile_id])->with('profiles')->one();
                        //$paidprofiles->profiles->name;exit; 
                                $j++;  
                            ?>    
                                <tr>
                                   <td><?= $j?></td> 
                                   <td><?= $record->paid_for_profile_id?></td>
                                   <td><?= $record->date?></td>
                                    
                                </tr>
                            <?php  
                                } 
                            ?>     
                        </tbody>
                   </table>


                