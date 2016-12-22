      <?php
use yii\helpers\Url;
?>

                <div class="col-sm-6">
                  <ul class="profile_item">
                    <a href="#">
                     <li class="profile_item-img">
                        <img style="height:70px;" src="images/profile/<?php echo $model->profile_image;?>" class="img-responsive" alt=""/>
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
