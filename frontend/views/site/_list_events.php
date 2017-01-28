<?php 
use yii\helpers\Url;
Use common\models\PaidForEvent;
?> 
<div class="profile_top">
      	<div style="text-transform:capitalize;">
      		<h2><?= $model->name?> </h2>
      	</div>
	    <div class="row">
	    <div class="col-md-6 profile_left-top">
	    	<img  src="images/events/<?= $model->image_file ?>" class="img-responsive event-image" alt="<?= $model->image_file ?>">
	    </div>
	    <div class="col-md-6">
	      <ul class="login_details1">
			 <p><?= $model->description ?> </p>
		  </ul>
		  <div style="margin-top:20px;">
                <i>
                    <span class="m_3"> 
                        <i class="fa fa-map-marker " aria-hidden="true"></i> 
                        <?= $model->venue ?>
                    </span>
                </i>
          </div>
		  <div class="form-group" style="margin-top:20px;">
		  	<ul class="footer_social">
		  		<li>
		  			<i class="fa fa-calendar " aria-hidden="true"></i>
 					<?= $model->date ?>
 				</li>
		  		<li> 
		  			<i class="fa fa-clock-o m_3" aria-hidden="true"></i>
 					<?= $model->start_time ?>
 				</li>
		  		<li> 
		  			<i class="fa fa-clock-o m_3" aria-hidden="true"></i>
 					<?= $model->end_time ?>
 				</li>
		  		<li> 
		  			<i class="fa fa-user m_3" aria-hidden="true"></i>
 					<?= $model->organised_by ?>
 				</li>
		  	</ul>
		  </div>

		  <?php
		  	if(isset(Yii::$app->user->identity->id))
		  	{
		  	$user_id=Yii::$app->user->identity->id;
		  	
		 	$paid=PaidForEvent::find()->where(['and', ['user_id' => $user_id], ['event_id'=>$model->id],['status'=>1]])->one();
		 	
		 	}else{
		 		$paid = array();
		 		//echo"array is";print_r(!empty($paid));exit;	
		 	}
		 	
		  	$similar = $model->id;
		  ?>

		  <div class="">
			   <a href="<?php echo Url::toRoute(['events/view','id'=>$similar]);?>" class="btn btn-success btn_1"><?php 
			   if(!empty($paid))
			   {
			   	echo \Yii::t('app', 'View full information');
			   }else{
			   echo \Yii::t('app', 'Register for Melava');	
			   }
			   
			   ?></a>
		   </div>
	    
	    </div>
	    </div>
</div>
