<?php

use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model common\models\Events */
$this->title = 'Event';
//print_r($events);

// echo $events[id];
 //exit;

?>

<div class="grid_3">
  <div class="container">
   <div class="breadcrumb1">
     <ul>
        <a href="<?php echo Url::toRoute('site/index');?>"><i class="fa fa-home home_1"></i></a>
        <span class="divider">&nbsp;|&nbsp;</span>
        <li class="current-page"><?= Html::encode(\Yii::t('app', $this->title)) ?></li>
     </ul>
   </div>
   <?php
    // foreach ($events as $events) {      
    ?>
<div class="profile_top">
      <div style="text-transform:capitalize;">
        <h2><?= $events->name ?> </h2>
      </div>
        <div class="col-md-6 profile_left-top">
            <img src="images/events/<?= $events->image_file ?>" class="img-responsive" alt="">
        </div>
        <div class="col-md-6">
          <ul class="login_details1">
             <p><?= $events->description ?> </p>
          </ul>
          <div style="margin-top:20px;">
                <i>
                    <span class="m_3"> 
                        <i class="fa fa-map-marker " aria-hidden="true"></i> 
                        <?= $events->venue ?>
                    </span>
                </i>
          </div>
          <div class="form-group" style="margin-top:20px;">
            <ul class="footer_social">
                <li>
                    <i class="fa fa-calendar" aria-hidden="true"></i>
                    <?= $events->date ?>
                </li>
                <li> 
                    <i class="fa fa-clock-o" aria-hidden="true"></i>
                    <?= $events->start_time ?>
                </li>
                <li> 
                    <i class="fa fa-clock-o" aria-hidden="true"></i>
                    <?= $events->end_time ?>
                </li>
                <li> 
                    <i class="fa fa-user" aria-hidden="true"></i>
                    <?= $events->organised_by ?>
                </li>
            </ul>
          </div>
        </div>
    </div>
  </div>
</div>