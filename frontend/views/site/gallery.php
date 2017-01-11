<?php
use yii\bootstrap\BootstrapAsset;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
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
  <?= 
        \yii\widgets\ListView::widget([
            'dataProvider' => $dataProvider,
            'options' => [
                'tag' => 'div',
                'class' => 'list-wrapper',
                'id' => 'list-wrapper',
            ],
            'layout' => "{summary}\n{items}\n\n<div class='clearfix'></div> <div class='row'>{pager}</div>",
            'itemView' => '_list_item',
        ]);
        ?>

</div>

</div>