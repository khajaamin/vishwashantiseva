<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\models\Helper;

/* @var $this yii\web\View */
/* @var $searchModel common\models\GallerySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Galleries';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="gallery-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Gallery', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            [
                'attribute'=>'image_file',
                'format' => 'html',
                'label' => 'Gallery Images',
                'value'=>function($data)
                {
                        return Html::img('../images/gallery/' . $data->image_file,
                        ['width' => '350px' ,'class' => 'img-responsive thumbnail']);
                },
                
                
                
            ],
            'description',
            [
                'attribute'=>'is_active',
                 'value'=>function($model)
                 {
                    $arr=Helper::getActiveInActiveStatus();
                    return $arr[$model->is_active];
                 },
                'filter'=>Helper::getActiveInActiveStatus(),
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
