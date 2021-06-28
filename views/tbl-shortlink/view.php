<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\TblShortlink */

$this->title = 'View Short Link: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Short Links', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-shortlink-view">

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
           </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'oringnal_link:ntext',
            'code',
            'insertdate',
        ],
    ]) ?>

</div>
