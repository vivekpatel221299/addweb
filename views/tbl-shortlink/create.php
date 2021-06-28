<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\TblShortlink */

$this->title = 'Create Short Link';
$this->params['breadcrumbs'][] = ['label' => 'Short Links', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-shortlink-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
