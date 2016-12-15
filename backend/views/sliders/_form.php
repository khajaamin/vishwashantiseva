<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>

<div class="sliders-form">
	<div class="panel panel-default">
	
		<div class="panel-heading">
			<h3>Slider</h3>
		</div>
		<div class="panel-body">
		<?php $form = ActiveForm::begin(); ?>
			<?= $form->field($model, 'heading')->textInput(['maxlength' => true]) ?>

    		<?= $form->field($model, 'caption')->textarea(['rows' => 6]) ?>

    		<?= $form->field($model, 'image_file')->fileInput() ?>

    		<?= $form->field($model, 'status')->dropDownList([ '1' => 'Active', '0' => 'Deactive', ], ['prompt' => 'select status']) ?>

    		

		    <div class="form-group">
		        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
		    </div>
		<?php ActiveForm::end(); ?>
		</div>
		
	</div>		
    
</div>
