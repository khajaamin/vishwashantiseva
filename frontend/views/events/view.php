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
    <div >
      <div style="text-transform:capitalize;">
        <h2><?= $events->name ?> </h2>
      </div>
        <div class="col-md-9 profile_left-top">
            <img style="width:100%;" src="images/events/<?= $events->image_file ?>" class="img-responsive" alt="">
        
        <div class="">
          <div>&nbsp;</div>
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
          <div>
            <button type="button" onclick="printDiv('printarea')" class="btn btn-primary btn_1"><span class="glyphicon glyphicon-print"></span> Print Receipt</button>
          </div>
        </div>
        </div>
    </div>
    <?php
     // echo Yii::$app->user->identity->username;
     //print_r($paid); exit;?>
    <div class="hidden-xs hidden-sm hidden-md hidden-lg" id="printarea">
      <div class="container-full"  style="border:5px solid black;padding:10px;">
          <div style="text-transform:capitalize;">
            <div class="text-center">
            <h1>
              <span class="m_3"> 
               <?= Html::encode(\Yii::t('app', 'vishvashanti yuva v mahila sanstha')) ?>
              </span>
            </h1>
            </div>
            <table width="100%" class="table table-bordered">
              <tr >
                <td><?= Html::encode(\Yii::t('app', 'Received From')) ?> : <?= Yii::$app->user->identity->username ?></td>
                <td><?= Html::encode(\Yii::t('app', 'Payment ID')) ?>:
                    <?= $paid['mihpayid'];  ?>                       
                </td>
              </tr>
              <tr>
                <td><?= Html::encode(\Yii::t('app', 'Event ID')) ?></td>
                <td>
                  <?= 'Vishwa_0'.$paid['event_id'] ?>                  
                </td>         
              </tr>
              <tr>
                <td><?= Html::encode(\Yii::t('app', 'Event Date')) ?></td>
                <td >                 
                  <?= $events->date ?>         
                </td>
              </tr>
              <tr>
                <td><?= Html::encode(\Yii::t('app', 'Event Name')) ?></td>
                <td>
                  <?= $events->name ?>      
                </td>
              </tr>
              <tr>
                <td><?= Html::encode(\Yii::t('app', 'Event Address')) ?></td>
                <td>                  
                  <span class="m_3"> 
                      <?= $events->venue ?>
                  </span>
                </td>
              </tr>
              <tr>                
                <td><?= Html::encode(\Yii::t('app', 'Event Time')) ?></td>
                <td >
                   <?= $events->start_time.' - '.$events->end_time ?>
                </td>
              </tr>
              <tr>

                <td><?= Html::encode(\Yii::t('app', 'Organised By')) ?> </td>
                <td >
                  <?= $events->organised_by ?>                      
                </td>
              </tr>
 <!--              <tr>
                <td>Payment ID</td>
                <td>
                    <?php //$paid['mihpayid'];  ?>                       
                </td>
              </tr> -->
              <tr>
                 <td><?= Html::encode(\Yii::t('app', 'Payment Date')) ?></td> 
                <td >
                    <?= $paid['addedon'] ?>
                </td>
              </tr>              
            </table>
            <table width="100%">
              <tr>
                <td>Verifier's Sign.</td>
                <td align="right">Applicant's Sign.</td>
              </tr>
              <tr>
                <td style="padding:30px;"></td>
                <td style="padding:30px;"></td>
              </tr>
            </table>
            <div align="right">
                Receipt Generated On :<?= date('D d-M-Y')?>   
                <div  style="padding:30px;"></div>  
            </div>
           
          </div>
  
      </div>
    </div>
      <div class="col-md-3 match_right">
   
        <div class="view_profile">
                <h3>View Melava's</h3>
                <?php
                foreach ($similars as $similars) {
                ?>          
                <ul class="profile_item">                 
                   <li class="profile_item-img">
                      <img src="images/events/<?= $similars->image_file ?>" class="img-responsive" alt=""/>
                   </li>
                   <li class="profile_item-desc">
                      <div style="text-transform:capitalize;"><h5><?= $similars->name ?></h5>
                      </div>
                      
                      <p>Date : <?= $similars->date ?></p>
                    <a href="<?php echo Url::toRoute('site/event');?>">
                      <h5>View Full Details</h5>
                    </a>
                   </li>
                   <div class="clearfix"> </div>            
                </ul>
                <?php } ?>
        </div>        

      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}
</script>