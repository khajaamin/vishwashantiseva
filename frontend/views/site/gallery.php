<?php
use yii\bootstrap\BootstrapAsset;
use yii\helpers\Url;
$this->registerJsFile('@web/kandepohe_static/js/lightbox.min.js', ['depends' => [\yii\web\JqueryAsset::className()]]);

$this->registerCssFile("@web/kandepohe_static/css/lightbox.min.css", [
    'depends' => [BootstrapAsset::className()]
]);
?>
<div class="grid_3">

 <div class="container">
   <div class="breadcrumb1">
     <ul>
        <a href="<?php echo Url::toRoute('site/index');?>"><i class="fa fa-home home_1"></i></a>
        <span class="divider">&nbsp;|&nbsp;</span>
        <li class="current-page"><?php echo \Yii::t('app', 'Gallery');?></li>
     </ul>
   </div>

   <div class="container">
    <div class="row">
        <?php 
        foreach($images as $image){ ?>
        <div class="col-md-3 thumbnail">
            <div>     
            
            <a href="images/gallery/<?php echo $image->image_file;?>"  data-lightbox="roadtrip">   
                <img src="images/gallery/<?php echo $image->image_file;?>" class="img-responsive">
            </a>
            </div>
        </div>
        <?php } ?>
    </div>
    </div>
</div>

</div>