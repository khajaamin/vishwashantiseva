<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\PaidProfiles */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="paid-profiles-form">

<div class="panel panel-default">
    <div class="panel-heading">
        <h3>Create Paid Profiles</h3>    
    </div>
    <div class="panel-body">
            <?php $form = ActiveForm::begin(); ?>



            <?= $form->field($model, 'paid_for_profile_id')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'date')->textInput() ?>

            <?= $form->field($model, 'status')->textInput() ?>

            <div class="form-group">
                <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
            </div>

            <?php ActiveForm::end(); ?>
    </div>
    
</div>
    

</div>
