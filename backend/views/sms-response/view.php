<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\SmsResponse */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Sms Responses', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sms-response-view">

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
            'error_code:ntext',
            'error_message:ntext',
            'jobid:ntext',
            'number',
            'msg_id:ntext',
            'part_id',
            'message:ntext',
            'send_on',
        ],
    ]) ?>

</div>
