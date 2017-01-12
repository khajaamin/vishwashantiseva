<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use common\models\Helper;
/* @var $this yii\web\View */
/* @var $model common\models\PaidForEvent */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Paid For Events', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="paid-for-event-view">

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

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'user_id',
            'event_id',
              [
                'attribute'=>'status',
                 $arr=Helper::getSuccessFailureStatus(),
                'value'=>$arr[$model->status],
            ],
            'mihpayid',
            'bankcode',
            'unmappedstatus',
        ],
    ]) ?>

</div>
