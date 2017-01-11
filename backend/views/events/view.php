<?php

use yii\helpers\Html;
use yii\widgets\DetailView;



$this->params['breadcrumbs'][] = ['label' => 'Events', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="events-view">

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
            
            'name',
            [
                'attribute'=>'image_file',
                'value'=>'../images/events/'.$model->image_file,
                'format' => ['image',['width'=>'200','height'=>'100']],
            ],
            
            'date',
            'start_time',
            'end_time',
            'venue:ntext',
            'description:ntext',
            'sms:ntext',
            'fees',
            'organised_by',
        ],
    ]) ?>

</div>
