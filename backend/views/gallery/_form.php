<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\Helper;

/* @var $this yii\web\View */
/* @var $model common\models\Gallery */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="gallery-form">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3>Gallery</h3>
		</div>
		<div class="panel-body">
			<?php $form = ActiveForm::begin(); ?>

		    <?= $form->field($model, 'image_file')->fileInput() ?>
		    <div class="row">
			    <div class='col-md-6'>
			    	<?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>	
			    </div>
		    </div>
		    <div class="row">
		    	<div class='col-md-6'>
		    		<?= $form->field($model, 'is_active')->dropDownList(Helper::getActiveInActiveStatus(),['prompt'=>'select status']) ?>
		    	
		    	</div>	
		    </div>
            
		    

		    <div class="form-group">
		        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
		    </div>

		    <?php ActiveForm::end(); ?>	
		</div>
	</div>
</div>
