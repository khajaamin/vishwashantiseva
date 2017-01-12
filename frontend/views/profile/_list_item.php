	 <?php use yii\helpers\Url;?>
	 <div class="profile_top">
     <a href="<?php echo Url::toRoute(['profile/view','id'=>$model->id]);?>">
      <h2><?php echo $model->id;?> | Profile Created for <?php echo $model->education;?></h2>
	    <div class="col-sm-3 profile_left-top">
	    	<?php if(!empty($model->profile_image)){
	    	?>		
	    		<img src="images/profile/<?php echo $model->profile_image;?>" class="img-responsive" alt=""/>
	    	<?php }else if($model->gender == 'm'){?>
	    		<img src="images/default.jpg" class="img-responsive" alt="default.jpg"/>
	    	<?php }else{  ?>
	    	<img src="images/defaultb.jpeg" class="img-responsive" alt="default.jpg"/>
	    	<?php } ?>
	    </div>
	    <div class="col-sm-3">
	      <ul class="login_details1">
			 <li><?php echo \Yii::t('app', 'Country');?> : <?php echo $model->country;?></li>
			 <li><p><?php echo $model->description ?></p></li>
		  </ul>
	    </div>
	    <div class="col-sm-6">
	    	<table class="table_working_hours">
	        	<tbody>
	        		<tr class="opened_1">
						<td class="day_label1"><?php echo \Yii::t('app', 'Age');?> /<?php echo \Yii::t('app', 'Height');?>  :</td>
						<td class="day_value"><?php echo $model->age."/".$model->height;?></td>
					</tr>
				    <tr class="opened">
						<td class="day_label1"><?php echo \Yii::t('app', 'Religion');?> :</td>
						<td class="day_value"><?php echo $model->religion;?></td>
					</tr>
					<tr class="opened">
						<td class="day_label1"><?php echo \Yii::t('app', 'Caste');?> :</td>
						<td class="day_value"><?php echo $model->caste;?></td>
					</tr>
				    <tr class="opened">
						<td class="day_label1"><?php echo \Yii::t('app', 'Marital Status');?> :</td>
						<td class="day_value"><?php echo $model->marital_status;?></td>
					</tr>
				    <tr class="opened">
						<td class="day_label1"><?php echo \Yii::t('app', 'Location');?> :</td>
						<td class="day_value"><?php echo $model->city;?></td>
					</tr>
				    <tr class="closed">
						<td class="day_label1"><?php echo \Yii::t('app', 'Profile Created by');?>  :</td>
						<td class="day_value closed"><span><?php echo (isset($model->user))?$model->user->username:"";?></span></td>
					</tr>
				    <tr class="closed">
						<td class="day_label1"><?php echo \Yii::t('app', 'Education');?> :</td>
						<td class="day_value closed"><span><?php echo $model->education;?></span></td>
					</tr>
			    </tbody>
		   </table>
		   <div class="buttons">
			   <!--<div class="vertical">Send Mail</div>
			   <div class="vertical">Shortlisted</div>-->
			   
			   <a href="<?php echo Url::toRoute(['profile/view','id'=>$model->id]);?>"><div class="vertical"><?php echo \Yii::t('app', 'View Full Profile');?></div>
				 </a>
		   </div>
	    </div>
	    <div class="clearfix"> </div>
    </a></div>
    