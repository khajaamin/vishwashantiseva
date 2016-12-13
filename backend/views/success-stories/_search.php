<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\SuccessStoriesSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="success-stories-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'groom_id') ?>

    <?= $form->field($model, 'bride_id') ?>

    <?= $form->field($model, 'marriage_of_this_groom') ?>

    <?= $form->field($model, 'setteled_with_this_bride') ?>

    <?php // echo $form->field($model, 'email') ?>

    <?php // echo $form->field($model, 'city') ?>

    <?php // echo $form->field($model, 'mobile') ?>

    <?php // echo $form->field($model, 'marriage_date') ?>

    <?php // echo $form->field($model, 'success_story') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
