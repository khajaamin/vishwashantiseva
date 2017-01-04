<?php

/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;
use yii\helpers\Url;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<div id="wrapper">
 <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href=""<?php echo Url::toRoute('site/index');?>">Vishwa Shanti Seva</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li><?= Html::a('Logout', ['site/logout'], ['data-method' => 'post']) ?>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown --> 
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                       
                        <li>
                            <a href="<?php echo Url::toRoute('site/index');?>"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                        
                         <li>
                            <a href="<?php echo Url::toRoute('user/index');?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Update user </a>
                        </li>
                        <li>
                            <a href="<?php echo Url::toRoute('masters/index');?>"><i class="fa fa-plus-circle" aria-hidden="true"></i>  Master </a>
                        </li>
                        <li>
                            <a href="<?php echo Url::toRoute('events/index');?>"><i class="fa fa-calendar" aria-hidden="true"></i>  Event </a>
                        </li>
                        <li>
                            <a href="<?php echo Url::toRoute('sliders/index');?>"><i class="fa fa-picture-o" aria-hidden="true"></i> Sliders </a>
                        </li>
                        <li>
                            <a href="<?php echo Url::toRoute('gallery/index');?>"><i class="fa fa-picture-o" aria-hidden="true"></i> Gallery </a>
                        </li>
                        <li>
                            <a href="<?php echo Url::toRoute('paid-profiles/index');?>"><i class="fa fa-money" aria-hidden="true"></i> Paid Profiles</a>
                        </li>
                        <li>
                            <a href="<?php echo Url::toRoute('paid-for-event/index');?>"><i class="fa fa-money" aria-hidden="true"></i> Paid For Events</a>
                        </li>
                        <li>
                            <a href="<?php echo Url::toRoute('site/sendsms');?>"><i class="fa fa-email" aria-hidden="true"></i> Send SMS</a>
                        </li>  
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>
</div>
<div id="page-wrapper">
    <?= $content ?>
</div>
</body>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
