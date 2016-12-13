<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Profiles */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Profiles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="profiles-view">

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
            // 'id',
            'user_id',
            'education_id',
            'name',
            'profile_image',
            'date_of_birth',
            'marital_status',
            'gender',
            'country',
            'state',
            'city',
            'mobile',
            'height',
            'blood_group',
            'complextion',
            'built',
            'religion',
            'caste',
            'sub_caste',
            'diet',
            'birthplace',
            'birthtime',
            'rashi',
            'nakshatra',
            'charan',
            'nadi',
            'gan',
            'gotra',
            'education',
            'occupation',
            'income',
            'father',
            'mother',
            'brothers',
            'sisters',
            'expected_caste',
            'expected_min_age',
            'expected_max_age',
            'expected_min_height',
            'expected_max_height',
            'expected_education',
            'expected_occupation',
        ],
    ]) ?>

</div>
