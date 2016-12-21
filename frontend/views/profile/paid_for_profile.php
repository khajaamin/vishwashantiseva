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
		<div class="col-md-offset-2 col-md-8">
			<?php
				if(count($records)==0)
					{
						echo"<center><h3 class='text-danger'>You are not paid for anyone...!!!</h3></center>";
					}
					else
					{
						    
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
			<?php			
						//echo "count=".count($records);
					}
			?>		
			</div>
		</div>
	</div>
</div>