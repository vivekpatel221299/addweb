<?php

use yii\helpers\Html;
use yii\grid\GridView;
use \nterms\pagesize;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\TblShortlinkSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Short Links';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-shortlink-index">
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Short Link', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
	Records Per Page :&nbsp; <?php echo  \nterms\pagesize\PageSize::widget(); ?>
    <?php Pjax::begin(['timeout' => 5000,'id' => 'tbl-shortlink','enablePushState' => false, 'enableReplaceState' => false, ]); ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
		'filterSelector' => 'select[name="per-page"]',
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'oringnal_link',
            'code',	
			[
                    'class' => 'yii\grid\ActionColumn',
					'header' => 'Action',
					 'template' => '{openoringallink}&nbsp;&nbsp;{delete}&nbsp;&nbsp;{view}',
					'buttons' => [
					'openoringallink' => function ($url, $model, $key) 
					{
						$oringnal_link = "'".$model->oringnal_link."'";
						return '<input type="button" value="New Tab" onclick="window.open('.$oringnal_link.')">';	
					}
            ]
			],
		
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
