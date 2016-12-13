<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\SlidersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Sliders';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sliders-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

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
                'attribute'=>'image_file',
                'format'=>'html',
                'value'=>function($data){
                    return Html::img("../../frontend/web/images/".$data["image_file"],["width"=>"200","height"=>"100","class"=>"img-responsive"]);
                }
                // 'value'=>'../../frontend/web/images/'.$data['image_file'],
                // 'format' => ['image',['width'=>'200','height'=>'100']],
            ],
            //'status',
            // 'created_by',
            // 'created_at',
            // 'updated_by',
            // 'updated_at',
            // 'is_deleted',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
