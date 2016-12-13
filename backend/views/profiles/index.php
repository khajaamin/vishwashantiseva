<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\ProfilesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Profiles';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="profiles-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Profiles', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            // 'user_id',
            // 'education_id',
            'name',
            'profile_image',
            'date_of_birth',
            'marital_status',
            'gender',
            // 'country',
            // 'state',
            // 'city',
            // 'mobile',
            // 'height',
            // 'blood_group',
            // 'complextion',
            // 'built',
            // 'religion',
            // 'caste',
            // 'sub_caste',
            // 'diet',
            // 'birthplace',
            // 'birthtime',
            // 'rashi',
            // 'nakshatra',
            // 'charan',
            // 'nadi',
            // 'gan',
            // 'gotra',
            // 'education',
            // 'occupation',
            // 'income',
            // 'father',
            // 'mother',
            // 'brothers',
            // 'sisters',
            // 'expected_caste',
            // 'expected_min_age',
            // 'expected_max_age',
            // 'expected_min_height',
            // 'expected_max_height',
            // 'expected_education',
            // 'expected_occupation',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
