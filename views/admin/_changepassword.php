<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Admin */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="admin-form">

    <?php $form = ActiveForm::begin(); ?>


    
	
	    <?= $form->field($model, 'old_password')->passwordInput(['maxlength' => true]) ?>
		
		    <?= $form->field($model, 'new_password')->passwordInput(['maxlength' => true]) ?>
			
			    <?= $form->field($model, 'repeat_password')->passwordInput(['maxlength' => true]) ?>
	

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Change Password', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
