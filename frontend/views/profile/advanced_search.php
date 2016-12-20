<?php
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

?>
<div class="grid_3">
  <div class="container">
        <div class="breadcrumb1">
          <ul>
            <a href="<?php echo Url::toRoute('site/index');?>"><i class="fa fa-home home_1"></i></a>
            <span class="divider">&nbsp;|&nbsp;</span>
            <li class="current-page">Advanced Search</li>
          </ul>
        </div>
   
        <div class="col-md-9 search_left">
            <?php echo $this->render("_advanced_search",['searchModel'=>$searchModel]);?>

           <div class="paid_people">
             <h1>Search Result</h1>
              <div class="row_1">
                <!-- <div class="col-sm-6 paid_people-left"> -->

                <?php  
        echo \yii\widgets\ListView::widget([
            'dataProvider' => $dataProvider,
            'options' => [
                'tag' => 'ul',
                'class' => 'profile_item',
                //'id' => 'list-wrapper',
            ],
           // 'layout' => "{pager}\n{items}\n{summary}",
            'itemView' => 'advanced_list_item',
        ]);
        ?> 
                 
              </div>
           </div>
        </div>
           
      <div class="col-md-3 match_right">
            <div class="profile_search1" >
                <?php echo Yii::$app->SearchById->welcome();?>
           
            </div>
            <div class="view_profile ">
                <h3>View Similar Profiles</h3>
                  <?php       
                  foreach ($similars as $similar) {
                  ?>
                  <ul class="profile_item">
                    <a href="#">
                     <li class="profile_item-img">
                        <img src="images/profile/<?php echo $similar->profile_image;?>" class="img-responsive" alt=""/>
                     </li>
                     <li class="profile_item-desc">
                        <h4><?php echo $similar->id;?></h4>
                        <p><?php echo $similar->marital_status;?></p>
                        <h5><a href="<?php echo Url::toRoute(['profile/view','id'=>$similar->id]);?>"><div class="vertical">View Full Profile</div>
                   </a></h5>
                     </li>
                     <div class="clearfix"> 
                     </div>
                    </a>
                 </ul>
                 <?php
                   }
                  ?>
            </div>
      </div>
      
  </div>
</div>
<!-- FlexSlider -->
<link href="css/flexslider.css" rel='stylesheet' type='text/css' />
  <script defer src="js/jquery.flexslider.js"></script>
  <script type="text/javascript">
  $(function(){
    SyntaxHighlighter.all();
  });
  $(window).load(function(){
    $('.flexslider').flexslider({
    animation: "slide",
    start: function(slider){
      $('body').removeClass('loading');
    }
    });
  });
  </script>
<!-- FlexSlider -->
 