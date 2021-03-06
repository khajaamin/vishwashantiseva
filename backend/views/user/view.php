<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;



$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-view">

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
        <a class="btn btn-primary btn-md" href="<?php echo Url::toRoute(['profiles/update','id'=>$model->id]);?>">Update profile >> </a>
        <a class="btn btn-primary btn-md" href="<?php echo Url::toRoute('user/index');?>">Back To Home</a>

    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            
            'profile_for',
            'username',
            
            'email:email',
            'mother_tongue',
            //'status',
            
        ],
    ]) ?>

</div>
