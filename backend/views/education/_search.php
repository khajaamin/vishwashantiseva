<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\EducationSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="education-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'user_id') ?>

    <?= $form->field($model, 'education_area') ?>

    <?= $form->field($model, 'education') ?>

    <?= $form->field($model, 'start_date') ?>

    <?php // echo $form->field($model, 'end_date') ?>

    <?php // echo $form->field($model, 'institute') ?>

    <?php // echo $form->field($model, 'result') ?>

    <?php // echo $form->field($model, 'place') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
