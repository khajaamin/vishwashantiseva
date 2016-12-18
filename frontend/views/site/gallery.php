<?php
use yii\bootstrap\BootstrapAsset;
$this->registerJsFile('@web/kandepohe_static/js/lightbox.min.js', ['depends' => [\yii\web\JqueryAsset::className()]]);

$this->registerCssFile("@web/kandepohe_static/css/lightbox.min.css", [
    'depends' => [BootstrapAsset::className()]
]);
?>
<div class="grid_3">

 <div class="container">
   <div class="breadcrumb1">
     <ul>
        <a href="index.html"><i class="fa fa-home home_1"></i></a>
        <span class="divider">&nbsp;|&nbsp;</span>
        <li class="current-page">Gallery</li>
     </ul>
   </div>


<div class="row">
    <?php foreach($images as $image):?>
    <div class="col-md-3">
     <a href="images/gallery/<?php echo $image->image_file;?>" data-lightbox="roadtrip">   <img src="images/gallery/<?php echo $image->image_file;?>" class="img-responsive"/></a>
    </div>
    <?php endforeach;?>
</div>
</div>

</div>