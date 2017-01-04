<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\PaidForEvent */

$this->title = 'Create Paid For Event';
$this->params['breadcrumbs'][] = ['label' => 'Paid For Events', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="paid-for-event-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
