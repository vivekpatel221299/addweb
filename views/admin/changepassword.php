<?php

use yii\helpers\Html;

$this->title = 'Change Password';
/*$this->params['breadcrumbs'][] = ['label' => 'Admins', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Admin_ID, 'url' => ['view', 'id' => $model->Admin_ID]];
$this->params['breadcrumbs'][] = 'Update';*/
?>
<div class="admin-update">

    
	<?php
		$session = Yii::$app->session;
		echo $session['myError'];
		unset($session['myError']);
	?>
    <?= $this->render('_changepassword', [
        'model' => $model,
    ]) ?>

</div>
