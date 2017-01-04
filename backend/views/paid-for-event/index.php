<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\models\Helper;
/* @var $this yii\web\View */
/* @var $searchModel common\models\PaidForEventSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Paid For Events';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="paid-for-event-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'id',
            'user_id',
            'event_id',            
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
