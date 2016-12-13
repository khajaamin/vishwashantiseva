<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Profiles */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Profiles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="profiles-view">
    <h1><?= Html::encode($this->title) ?></h1>
    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
</div>
<div class="grid_3">
  <div class="container">
   <div class="breadcrumb1">
     <ul>
        <a href="<?php echo Url::toRoute('site/index');?>"><i class="fa fa-home home_1"></i></a>
        <span class="divider">&nbsp;|&nbsp;</span>
        <li class="current-page"><?= Html::encode($this->title) ?></li>
     </ul>
   </div>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'user_id',
            'name',            
            [
                'attribute'=>'profile_image',
                'value'=>'images/profile/'.$model->profile_image,
                'format' => ['image',['width'=>'100','height'=>'100','class'=>'img-responsive']],
            ],
            'date_of_birth',
            'marital_status',
            'gender',
            'country',
            'state',
            'city',
            'mobile',
            'height',
            'weight',
            'blood_group',
            'complextion',
            'built',
            'religion',
            'caste',
            'sub_caste',
            'diet',
            'birthplace',
            'birthtime',
            'rashi',
            'nakshatra',
            'charan',
            'nadi',
            'gan',
            'gotra',
            'education',
            'occupation',
            'income',
            'father',
            'mother',
            'brothers',
            'sisters',
            'expected_caste',
            'expected_min_age',
            'expected_max_age',
            'expected_min_height',
            'expected_max_height',
            'expected_education',
            'expected_occupation',
        ],
    ]) ?>
</div>
</div>

