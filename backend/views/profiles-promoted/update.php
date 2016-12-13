<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\ProfilePromoted */

$this->title = 'Update Profile Promoted: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Profile Promoteds', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="profile-promoted-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
