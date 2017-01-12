<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\models\Helper;


/* @var $this yii\web\View */
/* @var $searchModel common\models\PaidProfilesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Paid Profiles';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="paid-profiles-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <!-- <?php //Html::a('Create Paid Profiles', ['create'], ['class' => 'btn btn-success']) ?> -->
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'user_id',
            'paid_for_profile_id',
            'date',
            [
                'attribute'=>'status',
                 'value'=>function($model)
                 {
                    $arr=Helper::getSuccessFailureStatus();
                    return $arr[$model->status];
                 },
                'filter'=>Helper::getSuccessFailureStatus(),
            ],
            'mihpayid',
            'bankcode',
            

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
