<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\Helper;
use yii\helpers\ArrayHelper;

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

<div class="col-md-4">
    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'type')->textInput(['maxlength' => true]) ?>

	<?= $form->field($model, 'is_active')->dropDownList(Helper::getActiveInActiveStatus(),['prompt'=>'select status']) ?>
    <?php 
        $parent=ArrayHelper::map(\common\models\Masters::find()->where(['type'=>'caste','parent_id'=>0])->asArray()->all(), 'id', 'name');
        echo  $form->field($model, 'parent_id')->dropDownList($parent,['prompt'=>'select parent']) 
    ?>   
    

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>
</div>

    <?php ActiveForm::end(); ?>		
		</div>
		
	</div>
    

</div>
