<?php

use yii\helpers\Html;
use yii\grid\GridView;


$this->title = 'Sliders';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sliders-index">

    <h1><?= Html::encode($this->title) ?></h1>
   

    <p>
        <?= Html::a('Create Sliders', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'heading',
            'caption:ntext',
                         [
                'attribute' => 'image_file',
                'format' => 'html',
                'label' => 'Slider Images',
                'value' => function ($data) {
                    return Html::img('../images/slider/' . $data['image_file'],
                        ['width' => '400px' ,'class' => 'img-responsive thumbnail']);
                },
            ],
            

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
