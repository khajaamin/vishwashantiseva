<?php 
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;

?>
<div class="grid_3">
  <div class="container">
   <div class="breadcrumb1">
     <ul>
        <a href="<?php echo Url::toRoute('site/index');?>"><i class="fa fa-home home_1"></i></a>
        <span class="divider">&nbsp;|&nbsp;</span>
        <li class="current-page"><?php echo \Yii::t('app', 'Quick Search');?></li>
     </ul>
   </div>

  <div class="profile_search">
      <div class="container wrap_1">
      <?php echo $this->render("_search_quick",['searchModel'=>$searchModel]);?>       

      </div>
    </div>  



   <div class="col-md-9 profile_left2">
       
        <div class="form_but2">
            <div class="clearfix"> </div>
        </div>

        <?= 
        \yii\widgets\ListView::widget([
            'dataProvider' => $dataProvider,
            'options' => [
                'tag' => 'div',
                'class' => 'list-wrapper',
                'id' => 'list-wrapper',
            ],
           // 'layout' => "{pager}\n{items}\n{summary}",
            'itemView' => '_list_item',
        ]);
        ?>
    
  </div>

  <div class="col-md-3 match_right">
       <div class="form_but2">
    
            <div class="clearfix"> </div>
        </div>
      	<div class="view_profile">
              	<h3>View Melava's</h3>
              	<?php
              	foreach ($similars as $similars) {
              	?>	       	
              	<ul class="profile_item">              	  
              	   <li class="profile_item-img">
              	   	  <img src="images/events/<?= $similars->image_file ?>" class="img-responsive" alt=""/>
              	   </li>
              	   <li class="profile_item-desc">
              	   	  <div style="text-transform:capitalize;"><h5><?= $similars->name ?></h5>
              	   	  </div>
              	   	  
              	   	  <p>Date : <?= $similars->date ?></p>
              	   	<a href="<?php echo Url::toRoute('site/event');?>">
              	   	  <h5>View Full Details</h5>
              	  	</a>
              	   </li>
              	   <div class="clearfix"> </div>        	  
                </ul>
              	<?php } ?>
        </div>	      

   </div>

   <div class="clearfix"> </div>
  </div>
</div>