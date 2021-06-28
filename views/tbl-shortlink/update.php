<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\TblShortlink */

$this->title = 'Update Short Link: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Short Links', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tbl-shortlink-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
