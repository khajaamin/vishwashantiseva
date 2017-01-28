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
use common\components\languageSwitcher;
AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <?= Html::csrfMetaTags()?>
   <!--  <link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">  -->
    <title>Vishwashanti Seva</title>
    <?= Html::csrfMetaTags() ?>
    <?php $this->head()?>
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
        <div class="container-fluid">
           <a class="brand" href="<?php echo Url::toRoute('site/index');?>"> 
           <img src="images/Logo.png" style="max-width:100%" alt="Vishwashanti Seva"></a>
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
                <?php
                 $menuItems = [
                    ['label' => \Yii::t('app', 'Home') , 'url' => ['/site/index']],
                    ['label' => \Yii::t('app', 'About Us'), 'url' => ['/site/about']],
                    ['label' => \Yii::t('app', 'Contact us'), 'url' => ['/site/contact']],
                    ['label' => \Yii::t('app', 'Search'), 'url'=>['profile/search']],
                    ['label' => \Yii::t('app', 'Advanced Search'), 'url'=>['profile/advancedsearch']],
                    ['label' => \Yii::t('app', 'Gallery'), 'url'=>['site/gallery']],
                    ['label' => \Yii::t('app', 'Event'), 'url'=>['site/event']],

                ];
                if (Yii::$app->user->isGuest) {

                    $menuItems[] = ['label' => \Yii::t('app', 'Login'), 'url' => ['/site/login']];
                    $menuItems[] = ['label' => \Yii::t('app', 'Register'), 'url' => ['/site/signup']];

                }else{
                
                $menuItems[] = [
                                    'label' => ucfirst(Yii::$app->user->identity->username),
                                    'items' => [
                                         ['label' => \Yii::t('app', 'My profile'), 'url' => ['profile/index']],
                                         ['label' => \Yii::t('app', 'My Events'), 'url' => ['profile/paidforevent']],
                                         
                                         '<li class="divider"></li>',
                                         '<li>'
                                            . Html::beginForm(['/site/logout'], 'post')
                                            . Html::submitButton(
                                                \Yii::t("app", "logout"),
                                                ['class' => 'btn btn-link logout']
                                            )
                                            . Html::endForm()
                                        . '</li>',
                                    ],
                                ];

                }
                echo Nav::widget([
                    'options' => ['class' => 'nav navbar-nav nav_1'],
                    'items' => $menuItems,
                ]);
                ?>
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
                <h4><?php echo \Yii::t('app', 'About Us');?></h4>
                <p>"विश्वशांती युवा व महिला संस्थेची स्थापना १९९६ रोजी संपन्न झाली. व शिवराञ सन २०१२ पासून शिवराञ महोत्सव, अभिषेक व जेष्ठ नागरिकांचा सत्कार संपन्न होत आहे. समाजातील विविध क्षेत्रामध्ये उल्लेखनीय काम करणाऱ्या प्रतिष्ठित व्यक्तींचा गुणगौरव सत्कार दरवर्षी साजरा केला जातो. विविध संस्थांना गरजेनुसार सायकल वाटप विद्यार्थ्यांना त्यांच्या कलेनुसार लागणारे साहित्य वाटप केले जाते. समाजातील लिंगायत, मुस्लिम व ख्रिश्चन या समाजातील दफन भूमी मिळविण्यासाठी शासन दरबारी प्रयत्न करीत आहे."</p>
            </div>
            <div class="col-md-4 col_2">
                <h4><?php echo \Yii::t('app', 'Help & Support');?></h4>
                <ul class="footer_links">
                    
                    <li><a href="<?php echo Url::toRoute('site/contact');?>"><?php echo \Yii::t('app', 'Contact us');?></a></li>
                    
                    <li><a href="<?php echo Url::toRoute('site/faqs');?>"><?php echo \Yii::t('app', 'FAQs');?></a></li>
                </ul>
            </div>
            <div class="col-md-4 col_2">
                <h4><?php echo \Yii::t('app', 'Quick Links');?></h4>
                <ul class="footer_links">
                    <li><a href="<?php echo Url::toRoute('site/privacy');?>"><?php echo \Yii::t('app', 'Privacy Policy');?></a></li>
                    <li><a href="<?php echo Url::toRoute('site/terms');?>"><?php echo \Yii::t('app', 'Terms and Conditions');?></a></li>
                    <li><a href="<?php echo Url::toRoute('site/service');?>"><?php echo \Yii::t('app', 'Services');?></a></li>
                </ul>
            </div>
            
            <div class="clearfix"> </div>
            <div class="copy">
              <p>Copyright &copy; <?= date('Y');?>  All Rights Reserved | Developed by Virtual Next Technology <a href="#" target="_blank"></a> </p>
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
