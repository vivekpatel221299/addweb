<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\AdminSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="admin-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'Admin_ID') ?>

    <?= $form->field($model, 'centerID') ?>

    <?= $form->field($model, 'dieticianID') ?>

    <?= $form->field($model, 'Admin_Name') ?>

    <?= $form->field($model, 'Admin_Email') ?>

    <?php // echo $form->field($model, 'Admin_Mobile') ?>

    <?php // echo $form->field($model, 'Admin_Password') ?>

    <?php // echo $form->field($model, 'Admin_Type') ?>

    <?php // echo $form->field($model, 'Admin_Address') ?>

    <?php // echo $form->field($model, 'Admin_Status') ?>

    <?php // echo $form->field($model, 'Admin_Last_Login') ?>

    <?php // echo $form->field($model, 'Created_Date') ?>

    <?php // echo $form->field($model, 'Admin_Code_Reset_Password') ?>

    <?php // echo $form->field($model, 'Admin_Exp_CRP') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
