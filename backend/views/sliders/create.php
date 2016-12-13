<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Sliders */

$this->title = 'Create Sliders';
$this->params['breadcrumbs'][] = ['label' => 'Sliders', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sliders-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
