<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\ContactForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;
use common\models\Sliders;
use common\components\languageSwitcher;
$this->title = 'Home';
?>
<style>
  
.img-responsive, .thumbnail > img, .thumbnail a > img, .carousel-inner > .item > img, .carousel-inner > .item > a > img {
    display: block;
    width: 100%;
    height: 450px;
}
</style>
<section>
    <div class="">
    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner" role="listbox">
      <?php foreach($sliders as $slider){ 
        $i=0;
        if($slider['status']){
      ?>
          <div class="item active">
              <img src="images/slider/<?= $slider['image_file'] ?>" alt="slider_image" >
              <div class="carousel-caption">
                 <h1><?= $slider['heading']?></h1> 
                 <?php
                          if (Yii::$app->user->isGuest) {
                      ?> 
                  <a href="<?php echo Url::toRoute('site/signup');?>" class="hvr-shutter-out-horizontal"><?php echo \Yii::t('app', 'Create your Profile');?></a>
                <?php }else{?>
                  <a href="<?php echo Url::toRoute('profile/update');?>" class="hvr-shutter-out-horizontal"><?php echo \Yii::t('app', 'Create your Profile');?></a>

                  <?php }?>
              </div>
          </div>
       <?php
        }else{
      ?>
          <div class="item">
              <img src="images/slider/<?= $slider['image_file']  ?>" alt="slider_image"  style="height:450px">
              <div class="carousel-caption">
                <h1><?= $slider['heading']?></h1>
                 <?php
                          if (Yii::$app->user->isGuest) {
                      ?> 
                  <a href="<?php echo Url::toRoute('site/signup');?>" class="hvr-shutter-out-horizontal"><?php echo \Yii::t('app', 'Create your Profile');?></a>
                <?php }else{?>
                  <a href="<?php echo Url::toRoute('profile/update');?>" class="hvr-shutter-out-horizontal"><?php echo \Yii::t('app', 'Create your Profile');?></a>

                  <?php }?>
              </div>
              
          </div>
      <?php    
        }
       $i++; 
      }?>
  </div> 
  <ol class="carousel-indicators">
    <?php  
    for ($j=0; $j <= $i; $j++) { 
    ?>
        <li data-target="#carousel-example-generic" data-slide-to="<?= $j?>" ></li>
    <?php }?>
  </ol>
  <!-- Controls -->
  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
  </a>
    </div>
    </div>
    <div class="profile_search">
      <div class="container wrap_1">
            <?php echo $this->render("/profile/_search_quick",['searchModel'=>$searchModel]);?>       

      </div>
    </div>    

    
</section> 


