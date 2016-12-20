<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\ContactForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;
use common\models\Sliders;

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


<!--<div class="grid_1">
      <div class="container">
        <h1>Featured Profiles</h1>
        <div class="heart-divider">
            <span class="grey-line"></span>
            <i class="fa fa-heart pink-heart"></i>
            <i class="fa fa-heart grey-heart"></i>
            <span class="grey-line"></span>
        </div>
        <ul id="flexiselDemo3">
          <li><div class="col_1"><a href="view_profile.html">
            <img src="kandepohe_static/images/1.jpg" alt="" class="hover-animation image-zoom-in img-responsive"/>
             <div class="layer m_1 hidden-link hover-animation delay1 fade-in">
                <div class="center-middle">About Him</div>
             </div>
             <h3><span class="m_3">Profile ID : MI-387412</span><br>28, Christian, Australia<br>Corporate</h3></a></div>
          </li>
          <li><div class="col_1"><a href="view_profile.html">
            <img src="kandepohe_static/images/2.jpg" alt="" class="hover-animation image-zoom-in img-responsive"/>
             <div class="layer m_1 hidden-link hover-animation delay1 fade-in">
                <div class="center-middle">About Her</div>
             </div>
             <h3><span class="m_3">Profile ID : MI-387412</span><br>28, Christian, Australia<br>Corporate</h3></a></div>
          </li>
          <li><div class="col_1"><a href="view_profile.html">
            <img src="kandepohe_static/images/3.jpg" alt="" class="hover-animation image-zoom-in img-responsive"/>
             <div class="layer m_1 hidden-link hover-animation delay1 fade-in">
                <div class="center-middle">About Him</div>
             </div>
             <h3><span class="m_3">Profile ID : MI-387412</span><br>28, Christian, Australia<br>Corporate</h3></a></div>
          </li>
          <li><div class="col_1"><a href="view_profile.html">
            <img src="kandepohe_static/images/4.jpg" alt="" class="hover-animation image-zoom-in img-responsive"/>
             <div class="layer m_1 hidden-link hover-animation delay1 fade-in">
                <div class="center-middle">About Her</div>
             </div>
             <h3><span class="m_3">Profile ID : MI-387412</span><br>28, Christian, Australia<br>Corporate</h3></a></div>
          </li>
          <li><div class="col_1"><a href="view_profile.html">
            <img src="kandepohe_static/images/5.jpg" alt="" class="hover-animation image-zoom-in img-responsive"/>
             <div class="layer m_1 hidden-link hover-animation delay1 fade-in">
                <div class="center-middle">About Him</div>
             </div>
             <h3><span class="m_3">Profile ID : MI-387412</span><br>28, Christian, Australia<br>Corporate</h3></a></div>
          </li>
          <li><div class="col_1"><a href="view_profile.html">
            <img src="kandepohe_static/images/6.jpg" alt="" class="hover-animation image-zoom-in img-responsive"/>
             <div class="layer m_1 hidden-link hover-animation delay1 fade-in">
                <div class="center-middle">About Her</div>
             </div>
             <h3><span class="m_3">Profile ID : MI-387412</span><br>28, Christian, Australia<br>Corporate</h3></a></div>
          </li>
        </ul>
    </div>
</div>
<div class="grid_2">
    <div class="container">
        <h2>Success Stories</h2>
        <div class="heart-divider">
            <span class="grey-line"></span>
            <i class="fa fa-heart pink-heart"></i>
            <i class="fa fa-heart grey-heart"></i>
            <span class="grey-line"></span>
        </div>
        <div class="row_1">
         <div class="col-md-8 suceess_story">
             <ul> 
               <li>
                    <div class="suceess_story-date">
                        <span class="entry-1">Dec 20, 2015</span>
                    </div>
                    <div class="suceess_story-content-container">
                        <figure class="suceess_story-content-featured-image">
                           <img width="75" height="75" src="kandepohe_static/images/7.jpg" class="img-responsive" alt=""/>                           
                        </figure>
                        <div class="suceess_story-content-info">
                            <h4><a href="#">Lorem & Ipsum</a></h4>                          
                            <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form,.<a href="#">More...</a></p>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="suceess_story-date">
                        <span class="entry-1">Dec 20, 2015</span>
                    </div>
                    <div class="suceess_story-content-container">
                        <figure class="suceess_story-content-featured-image">
                           <img width="75" height="75" src="kandepohe_static/images/8.jpg" class="img-responsive" alt=""/>                           
                        </figure>
                        <div class="suceess_story-content-info">
                            <h4><a href="#">Lorem & Ipsum</a></h4>                          
                            <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form,.<a href="#">More...</a></p>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="suceess_story-date">
                        <span class="entry-1">Dec 20, 2015</span>
                    </div>
                    <div class="suceess_story-content-container">
                        <figure class="suceess_story-content-featured-image">
                           <img width="75" height="75" src="kandepohe_static/images/9.jpg" class="img-responsive" alt=""/>                           
                        </figure>
                        <div class="suceess_story-content-info">
                            <h4><a href="#">Lorem & Ipsum</a></h4>                          
                            <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form,.<a href="#">More...</a></p>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="suceess_story-date">
                        <span class="entry-1">Dec 20, 2015</span>
                    </div>
                    <div class="suceess_story-content-container">
                        <figure class="suceess_story-content-featured-image">
                           <img width="75" height="75" src="kandepohe_static/images/10.jpg" class="img-responsive" alt=""/>                          
                        </figure>
                        <div class="suceess_story-content-info">
                            <h4><a href="#">Lorem & Ipsum</a></h4>                          
                            <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form,.<a href="#">More...</a></p>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="suceess_story-date">
                        <span class="entry-1">Dec 20, 2015</span>
                    </div>
                    <div class="suceess_story-content-container">
                        <figure class="suceess_story-content-featured-image">
                           <img width="75" height="75" src="kandepohe_static/images/11.jpg" class="img-responsive" alt=""/>                          
                        </figure>
                        <div class="suceess_story-content-info">
                            <h4><a href="#">Lorem & Ipsum</a></h4>                          
                            <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form,.<a href="#">More...</a></p>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="suceess_story-date">
                        <span class="entry-1">Dec 20, 2015</span>
                    </div>
                    <div class="suceess_story-content-container">
                        <figure class="suceess_story-content-featured-image">
                           <img width="75" height="75" src="kandepohe_static/images/12.jpg" class="img-responsive" alt=""/>                          
                        </figure>
                        <div class="suceess_story-content-info">
                            <h4><a href="#">Lorem & Ipsum</a></h4>                          
                            <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form,.<a href="#">More...</a></p>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="suceess_story-date">
                        <span class="entry-1">Dec 20, 2015</span>
                    </div>
                    <div class="suceess_story-content-container">
                        <figure class="suceess_story-content-featured-image">
                           <img width="75" height="75" src="kandepohe_static/images/13.jpg" class="img-responsive" alt=""/>                          
                        </figure>
                        <div class="suceess_story-content-info">
                            <h4><a href="#">Lorem & Ipsum</a></h4>                          
                            <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form,.<a href="#">More...</a></p>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
        <div class="col-md-4 row_1-right">
          <h3>News & Events</h3>
            <div class="box_1">
              <figure class="thumbnail1"><img width="170" height="155" src="kandepohe_static/images/14.jpg" class="img-responsive" alt=""/></figure>
              <div class="extra-wrap">
                <div class="post-meta">
                    <span class="day">
                    <time datetime="2014-05-25T10:15:43+00:00">25</time>
                    </span>
                    <span class="month">
                    <time datetime="2014-05-25T10:11:51+00:00">May</time>
                    </span>
                </div>
                <h4 class="post-title"><a href="#">There are many variations of passages</a></h4>
                <div class="clearfix"> </div>
                <div class="post-content">The standard chunk of Lorem Ipsum used since the 1500s..</div>
                <a href="#" class="vertical">Read More</a>
              </div>
            </div>
            <div class="box_1">
              <figure class="thumbnail1"><img width="170" height="155" src="kandepohe_static/images/15.jpg" class="img-responsive" alt=""/></figure>
              <div class="extra-wrap">
                <div class="post-meta">
                    <span class="day">
                    <time datetime="2014-05-25T10:15:43+00:00">25</time>
                    </span>
                    <span class="month">
                    <time datetime="2014-05-25T10:11:51+00:00">May</time>
                    </span>
                </div>
                <h4 class="post-title"><a href="#">There are many variations of passages</a></h4>
                <div class="clearfix"> </div>
                <div class="post-content">The standard chunk of Lorem Ipsum used since the 1500s..</div>
                <a href="#" class="vertical">Read More</a>
              </div>
            </div>
            <div class="box_2">
              <figure class="thumbnail1"><img width="170" height="155" src="kandepohe_static/images/1.jpg" class="img-responsive" alt=""/></figure>
              <div class="extra-wrap">
                <div class="post-meta">
                    <span class="day">
                    <time datetime="2014-05-25T10:15:43+00:00">25</time>
                    </span>
                    <span class="month">
                    <time datetime="2014-05-25T10:11:51+00:00">May</time>
                    </span>
                </div>
                <h4 class="post-title"><a href="#">There are many variations of passages</a></h4>
                <div class="clearfix"> </div>
                <div class="post-content">The standard chunk of Lorem Ipsum used since the 1500s..</div>
                <a href="#" class="vertical">Read More</a>
              </div>
            </div>
            <div class="religion">
               <div class="religion_1-title">Religion :</div>
               <a href="#" target="_blank" class="religion_1" title="Hindu Matrimonial" style="padding-left:0px !important;">Hindu</a>
                <span>|</span><a href="#" target="_blank" class="religion_1" title="Muslim Matrimonial">Muslim</a>
                <span>|</span><a href="#" target="_blank" class="religion_1" title="Christian Matrimonial">Christian</a>
                <span>|</span><a href="#" target="_blank" class="religion_1" title="Sikh Matrimonial">Sikh</a>
                <span>|</span><a href="#" target="_blank" class="religion_1" title="Inter Religion Matrimonial">Inter Religion</a>
            </div>
            <div class="religion">
               <div class="religion_1-title">Country :</div>
               <a href="#" target="_blank" class="religion_1" title="Hindu Matrimonial" style="padding-left:0px !important;">India</a>
                <span>|</span><a href="#" target="_blank" class="religion_1" title="Muslim Matrimonial">Australia</a>
                <span>|</span><a href="#" target="_blank" class="religion_1" title="Christian Matrimonial">Russia</a>
                <span>|</span><a href="#" target="_blank" class="religion_1" title="Sikh Matrimonial">India</a>
                <span>|</span><a href="#" target="_blank" class="religion_1" title="Inter Religion Matrimonial">Kuwait</a>
                <span>|</span><a href="#" target="_blank" class="religion_1" title="Inter Religion Matrimonial">Uk</a>
                <span>|</span><a href="#" target="_blank" class="religion_1" title="Inter Religion Matrimonial">View All</a>
            </div>
            <div class="religion">
               <div class="religion_1-title">Caste :</div>
               <a href="#" target="_blank" class="religion_1" title="Hindu Matrimonial" style="padding-left:0px !important;">Brahmin</a>
                <span>|</span><a href="#" target="_blank" class="religion_1" title="Muslim Matrimonial">Kapu</a>
                <span>|</span><a href="#" target="_blank" class="religion_1" title="Christian Matrimonial">Kamma</a>
                <span>|</span><a href="#" target="_blank" class="religion_1" title="Sikh Matrimonial">Padmasali</a>
                <span>|</span><a href="#" target="_blank" class="religion_1" title="Inter Religion Matrimonial">Reddy</a>
                <span>|</span><a href="#" target="_blank" class="religion_1" title="Inter Religion Matrimonial">View All</a>
            </div>
            <div class="religion">
               <div class="religion_1-title">Regional :</div>
               <a href="#" target="_blank" class="religion_1" title="Hindu Matrimonial" style="padding-left:0px !important;">Urdu</a>
                <span>|</span><a href="#" target="_blank" class="religion_1" title="Muslim Matrimonial">Hindi</a>
                <span>|</span><a href="#" target="_blank" class="religion_1" title="Christian Matrimonial">Telugu</a>
                <span>|</span><a href="#" target="_blank" class="religion_1" title="Sikh Matrimonial">Marwadi</a>
                <span>|</span><a href="#" target="_blank" class="religion_1" title="Inter Religion Matrimonial">Oriya</a>
                <span>|</span><a href="#" target="_blank" class="religion_1" title="Inter Religion Matrimonial">View All</a>
            </div>
         </div>
         <div class="clearfix"> </div>
       </div> 
      </div>
    </div>
    <div class="map">
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d242117.68137786316!2d73.72253592206822!3d18.52489016775948!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bc2bf2e67461101%3A0x828d43bf9d9ee343!2sPune%2C+Maharashtra!5e0!3m2!1sen!2sin!4v1481168060093"></iframe>
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
              <p>Copyright © 2015 Marital . All Rights Reserved  | Design by <a href="http://w3layouts.com/" target="_blank">W3layouts</a> </p>
            </div>
        </div>
    </div> -->
