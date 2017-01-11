<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\SmsResponse */

$this->title = 'Create Sms Response';
$this->params['breadcrumbs'][] = ['label' => 'Sms Responses', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sms-response-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
