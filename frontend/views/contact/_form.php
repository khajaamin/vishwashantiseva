<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Contact */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="contact-form">

    <?php $form = ActiveForm::begin(); ?>

<div class="row">
    <div class="col-md-offset-3 col-md-6 bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
       <div id="myTabContent" class="tab-content">
            <div role="tabpanel" class="tab-pane fade in active" id="home" aria-labelledby="home-tab">
                <div class="basic_1">
                    <div class="basic_1-left">
						    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
						    <?= $form->field($model, 'phone')->textInput() ?>

    						<?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

						    <?= $form->field($model, 'message')->textarea(['rows' => 2]) ?>
    				    <div class="form-group">
        					<?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success btn_1' : 'btn btn-primary btn_1']) ?>
   						</div>	
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

    <?php ActiveForm::end(); ?>

</div>
