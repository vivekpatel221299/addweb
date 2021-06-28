<?php
use yii\helpers\Html;
use backend\assets\AppAsset;
use yii\helpers\Url;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;
/* @var $this \yii\web\View */
/* @var $content string */

if (Yii::$app->controller->action->id === 'login' || Yii::$app->controller->action->id === 'request-password-reset' ) { 
/**
 * Do not use this code in your template. Remove it. 
 * Instead, use the code  $this->layout = '//main-login'; in your controller.
 */
    echo $this->render(
        'main-login',
        ['content' => $content]
    );
} else {

    if (class_exists('backend\assets\AppAsset')) {
        backend\assets\AppAsset::register($this);
    } else {
        app\assets\AppAsset::register($this);
    }

    dmstr\web\AdminLteAsset::register($this);

    $directoryAsset = Yii::$app->assetManager->getPublishedUrl('@vendor/almasaeed2010/adminlte/dist');
    ?>
    <?php $this->beginPage() ?>
    <!DOCTYPE html>
    <html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>"/>
		<link rel="shortcut icon" type="image/x-icon" href="../../../web/images/logo_mini.png">
        <meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="https://unpkg.com/ionicons@4.5.5/dist/css/ionicons.min.css" rel="stylesheet">
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
    </head>
    <body class="hold-transition skin-blue <?php if(!empty(Yii::$app->user->identity->Admin_ID)) { ?>sidebar-mini <?php } else { ?>sidebar-collapse<?php } ?>">
    <?php $this->beginBody() ?>

	
	<div class="wrapper">

        <?= $this->render(
            'header.php',
            ['directoryAsset' => $directoryAsset]
        ) ?>

        <?= $this->render(
            'left.php',
            ['directoryAsset' => $directoryAsset]
        )
        ?>

        <?= $this->render(
            'content.php',
            ['content' => $content, 'directoryAsset' => $directoryAsset]
        ) ?>
		
		  <?= $this->render(
            'left.php',
            ['directoryAsset' => $directoryAsset]
        )
        ?>

    </div>
	
    <?php $this->endBody() ?>
    </body>
    </html>
    <?php $this->endPage() ?>
	
<?php } ?>