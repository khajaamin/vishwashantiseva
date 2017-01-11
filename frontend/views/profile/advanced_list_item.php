<?php
    use yii\helpers\Url;
?>

<div class="col-sm-6">
    <ul class="profile_item">
    <a href="#">
        <li class="profile_item-img">
            <?php 
                if(!empty($model->profile_image)){ ?>                 
                    
                    <img src="images/profile/<?php echo $model->profile_image;?>" class="img-responsive" alt=""/>
            
            <?php }else if($model->gender == 'm'){?>
                    
                    <img src="images/default.jpg" class="img-responsive" alt="default.jpg"/>
            
            <?php }else{  ?>
            
                    <img src="images/defaultb.jpeg" class="img-responsive" alt="default.jpg"/>
            
            <?php } ?>
        </li>
        <li class="profile_item-desc">
            <h4><?php echo $model->id;?></h4>
            <p><?php echo $model->marital_status;?></p>
            <h5><a href="<?php echo Url::toRoute(['profile/view','id'=>$model->id]);?>"><div class="vertical"><?php echo \Yii::t('app', 'View Full Profile');?></div></a></h5>
        </li>
        <div class="clearfix"> </div>
    </a>
    </ul>
</div>
