<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\ProfilesSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="profiles-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'user_id') ?>

    <?= $form->field($model, 'education_id') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'profile_image') ?>

    <?php // echo $form->field($model, 'date_of_birth') ?>

    <?php // echo $form->field($model, 'marital_status') ?>

    <?php // echo $form->field($model, 'gender') ?>

    <?php // echo $form->field($model, 'country') ?>

    <?php // echo $form->field($model, 'state') ?>

    <?php // echo $form->field($model, 'city') ?>

    <?php // echo $form->field($model, 'mobile') ?>

    <?php // echo $form->field($model, 'height') ?>

    <?php // echo $form->field($model, 'blood_group') ?>

    <?php // echo $form->field($model, 'complextion') ?>

    <?php // echo $form->field($model, 'built') ?>

    <?php // echo $form->field($model, 'religion') ?>

    <?php // echo $form->field($model, 'caste') ?>

    <?php // echo $form->field($model, 'sub_caste') ?>

    <?php // echo $form->field($model, 'diet') ?>

    <?php // echo $form->field($model, 'birthplace') ?>

    <?php // echo $form->field($model, 'birthtime') ?>

    <?php // echo $form->field($model, 'rashi') ?>

    <?php // echo $form->field($model, 'nakshatra') ?>

    <?php // echo $form->field($model, 'charan') ?>

    <?php // echo $form->field($model, 'nadi') ?>

    <?php // echo $form->field($model, 'gan') ?>

    <?php // echo $form->field($model, 'gotra') ?>

    <?php // echo $form->field($model, 'education') ?>

    <?php // echo $form->field($model, 'occupation') ?>

    <?php // echo $form->field($model, 'income') ?>

    <?php // echo $form->field($model, 'father') ?>

    <?php // echo $form->field($model, 'mother') ?>

    <?php // echo $form->field($model, 'brothers') ?>

    <?php // echo $form->field($model, 'sisters') ?>

    <?php // echo $form->field($model, 'expected_caste') ?>

    <?php // echo $form->field($model, 'expected_min_age') ?>

    <?php // echo $form->field($model, 'expected_max_age') ?>

    <?php // echo $form->field($model, 'expected_min_height') ?>

    <?php // echo $form->field($model, 'expected_max_height') ?>

    <?php // echo $form->field($model, 'expected_education') ?>

    <?php // echo $form->field($model, 'expected_occupation') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
