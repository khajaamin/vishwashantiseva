<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Masters */

//$this->title = 'Create Masters';
$this->params['breadcrumbs'][] = ['label' => 'Masters', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="masters-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
