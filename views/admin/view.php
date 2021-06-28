<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Admin */

$this->title = $model->Admin_ID;
$this->params['breadcrumbs'][] = ['label' => 'Admins', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="admin-view">

    

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->Admin_ID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->Admin_ID], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'Admin_ID',
            'centerID',
            'dieticianID',
            'Admin_Name',
            'Admin_Email:email',
            'Admin_Mobile',
            'Admin_Password',
            'Admin_Type',
            'Admin_Address',
            'Admin_Status',
            'Admin_Last_Login',
            'Created_Date',
            'Admin_Code_Reset_Password',
            'Admin_Exp_CRP',
        ],
    ]) ?>

</div>
