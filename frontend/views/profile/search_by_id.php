
<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>

 <?php $form = ActiveForm::begin([
        'action' => ['profile/search'],
        'method' => 'get',
    ]); ?><div class="row">
<div class="col-md-8">
<?php echo $form->field($model,'id')->textInput(['placeholder'=>'Enter Profile ID :'])->label(false);?>
</div>
<div class="col-md-2">

<input type="submit" value="Go">
</div>
</div>
<?php ActiveForm::end(); ?>

