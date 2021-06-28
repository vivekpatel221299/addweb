<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Admin */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="admin-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Admin_Name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Admin_Email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Admin_Mobile')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Admin_Password')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Admin_Type')->dropDownList([ 'Admin' => 'Admin', 'Subadmin' => 'Subadmin', 'Center Owner' => 'Center Owner', 'Center Subuser' => 'Center Subuser', 'Dietician' => 'Dietician', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'Admin_Address')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Admin_Status')->dropDownList([ 'Active' => 'Active', 'Inactive' => 'Inactive', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'Admin_Last_Login')->textInput() ?>

    <?= $form->field($model, 'Created_Date')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
