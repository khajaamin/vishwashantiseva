<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Masters */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="masters-form">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3>Master</h3>
		</div>
		<div class="panel-body">
				<?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'type')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'is_active')->dropDownList([ '0' => 'Deactive', '1' => 'active', ], ['prompt' => 'select status']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>		
		</div>
		
	</div>
    

</div>
