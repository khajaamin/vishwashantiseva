<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model common\models\User */

$this->title = $model->id;
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
            'id',
            'profile_for',
            'username',
            'auth_key',
            'password_hash',
            'password_reset_token',
            'email:email',
            'mother_tongue',
            'status',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
