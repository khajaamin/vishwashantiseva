<?php
use yii\helpers\Html;
use yii\helpers\Url;
use common\models\PaidProfiles;

?>
<div class="grid_3">
  <div class="container">
	  	<div class="breadcrumb1">
	    <ul>
	        <a href="<?php echo Url::toRoute('site/index');?>"><i class="fa fa-home home_1"></i></a>
	        <span class="divider">&nbsp;|&nbsp;</span>
	        <li class="current-page"><?php echo \Yii::t('app', 'Paid For Profile');?></li>
	    </ul>
	    </div> 
		<div class="row">
			<div class="col-md-offset-1 col-md-11">
				<?php
					if(count($records)==0)
						{
							echo"<center><h3 class='text-danger'>You are not paid for anyone...!!!</h3></center>";
						}
						else
						{
							    echo"<div class='row'>";
				
	                                $j=0;
	                             foreach ($records as $record) {

	                             $paidprofiles=PaidProfiles::find()->where(['paid_for_profile_id'=>$record->paid_for_profile_id])->with('profiles')->one();
	                        //$paidprofiles->profiles->name;exit;


	                                $j++;  
	            ?>

	                            <div class="col-sm-4">
	                              <ul class="profile_item">
	                                <a href="#">
	                                 <li class="profile_item-img">
	                                    <img style="height: 70px;" src="images/profile/<?php echo $paidprofiles->profiles->profile_image;?>" class="img-responsive" alt=""/>
	                                 </li>
	                                 <li class="profile_item-desc">
	                                    <h4><?php echo $record->paid_for_profile_id;?></h4>
	                                    <p><?php echo $paidprofiles->profiles->marital_status;?></p>
	                                    <h5><a href="<?php echo Url::toRoute(['profile/view','id'=>$record->paid_for_profile_id]);?>"><div class="vertical"><?php echo \Yii::t('app', 'View Full Profile');?></div></a></h5>
	                                 </li>
	                                 <div class="clearfix"> </div>
	                                </a>
	                              </ul>
	                            </div>    
	                                
	            <?php 
	                        } 
	                        echo "</div>";
	                  	}
	            ?>

								
						
				</div>
			</div>
	</div>
</div>
