<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use \nterms\pagesize;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\AdminSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Admins';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="admin-index">

    
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Admin', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
	<?php Pjax::begin(['timeout' => 5000,'id' => 'admin','enablePushState' => true, 'enableReplaceState' => false, ]); ?>
	Records Per Page :&nbsp; <?php echo \nterms\pagesize\PageSize::widget(); ?>		
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
		'filterSelector' => 'select[name="per-page"]',
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'Admin_ID',
            'centerID',
            'dieticianID',
            'Admin_Name',
            'Admin_Email:email',
            // 'Admin_Mobile',
            // 'Admin_Password',
            // 'Admin_Type',
            // 'Admin_Address',
            // 'Admin_Status',
            // 'Admin_Last_Login',
            // 'Created_Date',
            // 'Admin_Code_Reset_Password',
            // 'Admin_Exp_CRP',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>	
</div>
