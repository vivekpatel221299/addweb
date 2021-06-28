<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Admin */

$this->title = 'Update Admin: ' . $model->Admin_ID;
$this->params['breadcrumbs'][] = ['label' => 'Admins', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Admin_ID, 'url' => ['view', 'id' => $model->Admin_ID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="admin-update">

    

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
