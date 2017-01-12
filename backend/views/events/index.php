<?php

use yii\helpers\Html;
use yii\grid\GridView;



$this->title = 'Events';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="events-index">

    <h1><?= Html::encode($this->title) ?></h1>
    

    <p>
        <?= Html::a('Create Events', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            'name',
            [
                'attribute' => 'image_file',
                'format' => 'html',
                'label' => 'Event Images',
                'value' => function ($data) {
                    return Html::img('../images/events/' . $data['image_file'],
                        ['width' => '400px' ,'class' => 'img-responsive thumbnail']);
                },
            ],
            [

                'attribute' => 'title',
                'format' => 'raw',
                'value' => function ($model, $key, $index) {
                    return Html::a("Send Sms",  Yii::$app->urlManager->createUrl(array_merge(["events/send"], ['id' => $model->id])), ['class'=>'btn btn-info']);
                },
              
            ],
            'date',
            'start_time',
            'end_time',
            // 'venue:ntext',
            // 'description:ntext',
            // 'organised_by',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
