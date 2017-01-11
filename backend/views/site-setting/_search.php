<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\SiteSettingSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="site-setting-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'email') ?>

    <?= $form->field($model, 'contact_no') ?>

    <?= $form->field($model, 'salt') ?>

    <?php // echo $form->field($model, 'merchant_key') ?>

    <?php // echo $form->field($model, 'payment_url') ?>

    <?php // echo $form->field($model, 'smsurl') ?>

    <?php // echo $form->field($model, 'price_control') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
