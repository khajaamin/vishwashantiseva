<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
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
    <link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet"> 
    <title>Vishwas Shanti Seva</title>
    <?php $this->head() ?>
    <style type="text/css">
      .brand{
        font-family: 'Lobster', cursive;
        text-decoration: none;
        color: white;
        font-size:28px; 
      }
      .brand:hover{
        color: white;
      }
    </style>
</head>
<body>
<?php $this->beginBody() ?>
<div class="wrap">
    <div class="navbar navbar-inverse-blue">
    <!--<div class="navbar navbar-inverse-blue navbar-fixed-top">-->
      <div class="navbar-inner " >
        <div class="container">
           <a class="brand" href="<?php echo Url::toRoute('site/index');?>"> <img src="images/Logo.png" alt="Vishwashanti Seva"></a>
           <div class="pull-right">
            <nav class="navbar nav_bottom" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header nav_2">
              <button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse" data-target="#bs-megadropdown-tabs">Menu
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="#"></a>
           </div> 
           <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
                <ul class="nav navbar-nav nav_1">
                    <li><a href="<?php echo Url::toRoute('site/index');?>"><?php echo \Yii::t('app', 'Home');?></a></li>

                    <li><a href="<?php echo Url::toRoute('profile/search');?>"><?php echo \Yii::t('app', 'Search');?></a></li>
                    <li><a href="<?php echo Url::toRoute('profile/advancedsearch');?>"><?php echo \Yii::t('app', 'Advanced Search');?></a></li>
                    <li><a href="<?php echo Url::toRoute('site/gallery');?>"><?php echo \Yii::t('app', 'Gallery');?></a></li>

                      <?php
                          if (Yii::$app->user->isGuest) {
                      ?> 
                        <li><a href="<?php echo Url::toRoute('site/login');?>"><?php echo \Yii::t('app', 'Login');?> </a></li>
                        <li><a href="<?php echo Url::toRoute('site/signup');?>"><?php echo \Yii::t('app', 'Register');?></a></li>
                        


                        <?php }else{?>
                          
                        <li class="dropdown">
                          <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?= ucfirst(Yii::$app->user->identity->username) ?><span class="caret"></span></a>
                          <ul class="dropdown-menu" role="menu">
                            <li><a href="<?php echo Url::toRoute('profile/index');?>"><?php echo \Yii::t('app', 'My profile');?></a></li>
                            <li><?= Html::a(\Yii::t("app", "logout"), ['site/logout'], ['data' => ['method' => 'post']]) ?></li>
                          </ul>
                        </li> 

                      <?php  }?>

                </ul>
             </div><!-- /.navbar-collapse -->
            </nav>
           </div> <!-- end pull-right -->
          <div class="clearfix"> </div>
        </div> <!-- end container -->
      </div> <!-- end navbar-inner -->
    </div> <!-- end navbar-inverse-blue -->
    <div class="">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>
   <div class="footer">
        <div class="container">
            <div class="col-md-4 col_2">
                <h4>About Us</h4>
                <p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris."</p>
            </div>
            <div class="col-md-2 col_2">
                <h4>Help & Support</h4>
                <ul class="footer_links">
                    <li><a href="#">24x7 Live help</a></li>
                    <li><a href="contact.html">Contact us</a></li>
                    <li><a href="#">Feedback</a></li>
                    <li><a href="faq.html">FAQs</a></li>
                </ul>
            </div>
            <div class="col-md-2 col_2">
                <h4>Quick Links</h4>
                <ul class="footer_links">
                    <li><a href="privacy.html">Privacy Policy</a></li>
                    <li><a href="terms.html">Terms and Conditions</a></li>
                    <li><a href="services.html">Services</a></li>
                </ul>
            </div>
            <div class="col-md-2 col_2">
                <h4>Social</h4>
                <ul class="footer_social">
                  <li><a href="#"><i class="fa fa-facebook fa1"> </i></a></li>
                  <li><a href="#"><i class="fa fa-twitter fa1"> </i></a></li>
                  <li><a href="#"><i class="fa fa-google-plus fa1"> </i></a></li>
                  <li><a href="#"><i class="fa fa-youtube fa1"> </i></a></li>
                </ul>
            </div>
            <div class="clearfix"> </div>
            <div class="copy">
              <p>Copyright &copy; <?= date('Y');?> 2016 All Rights Reserved | Developed by Virtual Next Technology <a href="#" target="_blank"></a> </p>
            </div>
        </div>
    </div>
<?php $this->endBody() ?>

 <script type="text/javascript">
         $(document).ready(function() {
            $("#flexiselDemo3").flexisel({
                visibleItems: 6,
                animationSpeed: 1000,
                autoPlay:false,
                autoPlaySpeed: 3000,            
                pauseOnHover: true,
                enableResponsiveBreakpoints: true,
                responsiveBreakpoints: { 
                    portrait: { 
                        changePoint:480,
                        visibleItems: 1
                    }, 
                    landscape: { 
                        changePoint:640,
                        visibleItems: 2
                    },
                    tablet: { 
                        changePoint:768,
                        visibleItems: 3
                    }
                }
            });
            
        });
</script>
<script>
$(document).ready(function(){
    $(".dropdown").hover(            
        function() {
            $('.dropdown-menu', this).stop( true, true ).slideDown("fast");
            $(this).toggleClass('open');        
        },
        function() {
            $('.dropdown-menu', this).stop( true, true ).slideUp("fast");
            $(this).toggleClass('open');       
        }
    );
});

</script>
</body>
</html>
<?php $this->endPage() ?>
