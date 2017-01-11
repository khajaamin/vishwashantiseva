<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\SmsResponseSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Sms Responses';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sms-response-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php //Html::a('Create Sms Response', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'error_code:ntext',
            'error_message:ntext',
            'jobid:ntext',
            'number',
            // 'msg_id:ntext',
            // 'part_id',
            // 'message:ntext',
            // 'send_on',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
