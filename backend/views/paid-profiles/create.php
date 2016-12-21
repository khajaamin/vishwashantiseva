<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\PaidProfiles */

//$this->title = 'Create Paid Profiles';
$this->params['breadcrumbs'][] = ['label' => 'Paid Profiles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="paid-profiles-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
