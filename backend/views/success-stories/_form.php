<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\SuccessStories */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="success-stories-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'groom_id')->textInput() ?>

    <?= $form->field($model, 'bride_id')->textInput() ?>

    <?= $form->field($model, 'marriage_of_this_groom')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'setteled_with_this_bride')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'city')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mobile')->textInput() ?>

    <?= $form->field($model, 'marriage_date')->textInput() ?>

    <?= $form->field($model, 'success_story')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
