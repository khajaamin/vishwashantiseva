<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\SuccessStories */

$this->title = 'Create Success Stories';
$this->params['breadcrumbs'][] = ['label' => 'Success Stories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="success-stories-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
