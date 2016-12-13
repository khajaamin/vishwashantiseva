<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\SuccessStoriesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Success Stories';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="success-stories-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Success Stories', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'groom_id',
            'bride_id',
            'marriage_of_this_groom',
            'setteled_with_this_bride',
            // 'email:email',
            // 'city',
            // 'mobile',
            // 'marriage_date',
            // 'success_story:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
