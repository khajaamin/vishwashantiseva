<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\ProfilePromoted */

$this->title = 'Create Profile Promoted';
$this->params['breadcrumbs'][] = ['label' => 'Profile Promoteds', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="profile-promoted-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
