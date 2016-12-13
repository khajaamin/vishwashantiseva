<?php

use yii\helpers\Html;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $model common\models\Education */

$this->title = 'Update Education Details'
?>
<div class="grid_3">
  <div class="container">
   <div class="breadcrumb1">
     <ul>
        <a href="<?php echo Url::toRoute('site/index');?>"><i class="fa fa-home home_1"></i></a>
        <span class="divider">&nbsp;|&nbsp;</span>
        <li class="current-page"><?= Html::encode($this->title) ?></li>
     </ul>
   </div>
    <div class="col_4">
        <div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
           <ul id="myTab" class="nav nav-tabs nav-tabs1" role="tablist">
              <li role="presentation" ><a href="<?php echo Url::toRoute('profile/update')?>" id="home-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true">Basic Detail</a></li>
              <li role="presentation"  class="active">
              <a href="<?php echo Url::toRoute('education/index');?>" role="tab" id="profile-tab" >Education Details</a></li>
              <li role="presentation"><a href="<?php echo Url::toRoute('contact/index');?>" role="tab" id="profile-tab1" >Contact Details</a></li>
           </ul>
            <div id="myTabContent" class="tab-content">
                <div role="tabpanel" class="tab-pane fade in active" id="home" aria-labelledby="home-tab">
                    <div class="basic_1">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
</div>
