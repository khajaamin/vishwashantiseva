<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $model common\models\Education */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Educations', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="education-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->user_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
        <a class="btn btn-primary btn-md" href="<?php echo Url::toRoute(['contact/update','id'=>$model->user_id]);?>">Update contact>></a>
        <a class="btn btn-primary btn-md" href="<?php echo Url::toRoute('user/index');?>">Back To Home</a>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            // 'id',
            'user_id',
            'education_area',
            'education',
            'start_date',
            'end_date',
            'institute',
            'result',
            'place',
        ],
    ]) ?>

</div>
