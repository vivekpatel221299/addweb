<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;


/* @var $this yii\web\View */
/* @var $model backend\models\TblShortlink */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tbl-shortlink-form">

    <?php $form = ActiveForm::begin([  'id' => $model->formName(),
           'enableAjaxValidation' => false,
       ],[
	'layout' => 'horizontal',
    'fieldConfig' => [
        'template' => "{label}\n{beginWrapper}\n{input}\n{hint}\n{error}\n{endWrapper}",
        'horizontalCssClasses' => [
            'label' => 'col-sm-4',
            'offset' => 'col-sm-offset-4',
            'wrapper' => 'col-sm-8',
            'error' => '',
            'hint' => '',
        ],
    ],
	]); ?>
<div class="row">
<div class="help-block help-block-error" style="color:red!important">
<?php echo  Html::errorSummary($model); ?> 
</div>
</div>
<div class="row">

<div class="col-sm-5">

    <?= $form->field($model, 'oringnal_link')->textInput(['maxlength' => true]) ?>
</div>

</div>
<div class="row">
</div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
