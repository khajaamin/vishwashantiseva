<?php

use yii\helpers\Html;
use yii\helpers\Url;




$this->params['breadcrumbs'][] = ['label' => 'Profiles', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="profiles-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
     <center>
     	<a class="btn btn-primary btn-md" href="<?php echo Url::toRoute(['education/update','id'=>$model->id]);?>">Update Education >></a>
     </center> 

</div>
