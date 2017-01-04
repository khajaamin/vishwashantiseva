<?php
use yii\helpers\Html;
use yii\helpers\Url;
use common\models\PaidForEvent;

?>
<div class="grid_3">
  <div class="container">
	  	<div class="breadcrumb1">
	    <ul>
	        <a href="<?php echo Url::toRoute('site/index');?>"><i class="fa fa-home home_1"></i></a>
	        <span class="divider">&nbsp;|&nbsp;</span>
	        <li class="current-page"><?php echo \Yii::t('app', 'Event');?></li>
	    </ul>
	    </div> 
		<div class="row">
			<div class="col-md-offset-1 col-md-11">
				<?php
					$msg = \Yii::t('app', 'Sorry You are not Registered for any of the Event');
					if(count($records)==0)
						{
							echo"<center><h3 class='text-danger'>".$msg."...!!!</h3></center>";
						}
						else
						{
							    echo"<div class='row'>";
				
	                                $j=0;
	                            
	                             foreach ($records as $record) {

	                             $paidprofiles=PaidForEvent::find()->where(['event_id'=>$record->event_id])->with('events')->one();
	                            
	                                $j++;  
	            ?>
	                            <div class="col-md-3 ">

	                              <img style="height: 100px; width:100%;" src="images/events/<?php echo $paidprofiles->events->image_file; ?>" alt="<?php echo $paidprofiles->events->image_file;?>"/>
	                              <div>&nbsp;</div>
	                              <ul class="profile_item">	                  
	                                 <li class="profile_item-desc">
	                                    <h4>
	                                    	<?php echo $paidprofiles->events->name; ?>
	                                    		
	                                    </h4>
	                                    <p><?php  
	                                    	if(strlen($paidprofiles->events->description) > 100){
	                                    		echo substr($paidprofiles->events->description,0,100).' [...]';	
	                                    	}
	                                    	?></p>
	                                    <p><?php 
	                                    $originalDate = $paidprofiles->events->start_time;
										$newDate = date("d-M-Y", strtotime($originalDate));

	                                    echo '<i class="fa fa-calendar " aria-hidden="true"></i> '.$newDate; 
	                                    echo ' <i class="fa fa-clock-o " aria-hidden="true"></i> '.$paidprofiles->events->start_time.' - '.$paidprofiles->events->end_time;
	                                    
										
	                                    ?>
	                                    	
	                                    </p>
	                                    <a href="<?php 
	                                    echo Url::toRoute(['events/view','id'=>$record->event_id]);?>"><h5> Read More</h5></a>
	                                    
	                                 </li>
	                                 <div class="clearfix"> </div>
	                                
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
