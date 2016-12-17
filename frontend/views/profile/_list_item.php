	 <?php use yii\helpers\Url;?>
	 <div class="profile_top">
     <a href="view_profile.html">
      <h2><?php echo $model->id;?> | Profile Created for <?php echo $model->education;?></h2>
	    <div class="col-sm-3 profile_left-top">
	    	<img src="images/profile/<?php echo $model->profile_image;?>" class="img-responsive" alt=""/>
	    </div>
	    <div class="col-sm-3">
	      <ul class="login_details1">
			 <li>Last Login : <?php echo $model->education;?></li>
			 <li><p><?php echo $model->description ?></p></li>
		  </ul>
	    </div>
	    <div class="col-sm-6">
	    	<table class="table_working_hours">
	        	<tbody>
	        		<tr class="opened_1">
						<td class="day_label1">Age / Height :</td>
						<td class="day_value"><?php echo $model->height;?></td>
					</tr>
				    <tr class="opened">
						<td class="day_label1">Last Login :</td>
						<td class="day_value"><?php echo $model->education;?></td>
					</tr>
				    <tr class="opened">
						<td class="day_label1">Religion :</td>
						<td class="day_value"><?php echo $model->caste;?></td>
					</tr>
				    <tr class="opened">
						<td class="day_label1">Marital Status :</td>
						<td class="day_value"><?php echo $model->marital_status;?></td>
					</tr>
				    <tr class="opened">
						<td class="day_label1">Location :</td>
						<td class="day_value"><?php echo $model->city;?></td>
					</tr>
				    <tr class="closed">
						<td class="day_label1">Profile Created by :</td>
						<td class="day_value closed"><span><?php echo (isset($model->user))?$model->user->username:"";?></span></td>
					</tr>
				    <tr class="closed">
						<td class="day_label1">Education :</td>
						<td class="day_value closed"><span><?php echo $model->education;?></span></td>
					</tr>
			    </tbody>
		   </table>
		   <div class="buttons">
			   <!--<div class="vertical">Send Mail</div>
			   <div class="vertical">Shortlisted</div>-->
			   <a href="<?php echo Url::toRoute('profile/fullprofile&id='.$model->id);?>"><div class="vertical">View Full Profile</div>
				 </a>
		   </div>
	    </div>
	    <div class="clearfix"> </div>
    </a></div>
    