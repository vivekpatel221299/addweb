<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;


@session_start(); 
$this->title = 'Demo App';
$this->params['breadcrumbs'][] = $this->title;



?>


<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Demo App | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  
  <![endif]-->
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">

      <!--<img src="../../../web/images/logo_intro.png" width="100%">-->
      <img src="../../../web/images/logo_login.png" alt="FlyMyOwn App" >
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Please fill out your email. A link to reset password will be sent there.</p>

     <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
    
<!--        $form->field($model, 'verifyCode')->widget(Captcha::className(), [
                    'template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-6">{input}</div></div>',
                ]) ?>-->

      <div class="form-group has-feedback">
        <?= $form->field($model, 'Admin_Email')->textInput(['autofocus' => true,'placeholder'=>'Email',"value"=>"admin@gmail.com"])->label(false); ?>

        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>

        <div class="form-group has-feedback">
        
         <?= Html::submitButton('Submit', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
          &nbsp;&nbsp;&nbsp;Click here to <?= Html::a('Login', ['site/login']) ?>.
      </div>
    <?php ActiveForm::end(); ?>
  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 2.2.3 -->
<script src="../../plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="../../bootstrap/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="../../plugins/iCheck/icheck.min.js"></script>

</script>
</body>
</html>
