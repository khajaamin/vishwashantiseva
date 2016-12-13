<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\SuccessStories */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Success Stories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="success-stories-view">

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
            'groom_id',
            'bride_id',
            'marriage_of_this_groom',
            'setteled_with_this_bride',
            'email:email',
            'city',
            'mobile',
            'marriage_date',
            'success_story:ntext',
        ],
    ]) ?>

</div>
