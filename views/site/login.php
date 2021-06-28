<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

$this->title = 'Demo | Sign In';	

$fieldOptions1 = [
    'options' => ['class' => 'form-group has-feedback'],
    'inputTemplate' => "{input}<span class='glyphicon glyphicon-envelope form-control-feedback'></span>"
];

$fieldOptions2 = [
    'options' => ['class' => 'form-group has-feedback'],
    'inputTemplate' => "{input}<span class='glyphicon glyphicon-lock form-control-feedback'></span>"
];

	

?>

<div class="login-box">
    <div class="login-logo">
        <!-- <a href="#"><b>Admin</b>LTE</a> -->
        <img src="../../../web/images/logo_login.png">
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg">Sign in to start your session</p>

        <?php $form = ActiveForm::begin(['id' => 'login-form', 'enableClientValidation' => false]); ?>

        <?= $form
            ->field($model, 'Admin_Email', $fieldOptions1)
            ->label(false)
            ->textInput(['placeholder' => $model->getAttributeLabel('Email')]) ?>

        <?= $form
            ->field($model, 'Admin_Password', $fieldOptions2)
            ->label(false)
            ->passwordInput(['placeholder' => $model->getAttributeLabel('Password')]) ?>

        <div class="row">
            <div class="col-xs-12">
                <?php /* $form->field($model, 'rememberMe')->checkbox() */ ?>
<?= $form->field($model, 'captcha')
                    ->widget(Captcha::className(), ['captchaAction' => ['/site/captcha']])->hint('Hint: click on the captch code to refresh') ?>            
			<?php 
			/*
             <p class="contact"><label for="password">Enter Captcha Code</label>    <img src="../../../views/site/captcha.php" id="as_captcha" alt="Captcha" /></p> 
            </div>
			<div class="col-xs-12">
            <input type="text" value="" name="captcha" id="captcha" class="form-control"    data-rule-required="true"  required=""   />
            <span class="a1" id="change_captcha" style="cursor: pointer;" onclick="Tryagain();"><p>Can't read?</p> <p style="margin-left:70px;margin-top: -28px;color: blue" onmouseover="this.style.color='green'" onmouseout="this.style.color='blue'">Try another one</p></span>
			*/ ?>
</div>

            <!-- /.col -->
            <div class="col-xs-4">
                <?= Html::submitButton('Sign in', ['class' => 'btn btn-primary btn-block btn-flat', 'name' => 'login-button']) ?>
            </div>
            <!-- /.col -->
        </div>


        <?php ActiveForm::end(); ?>

       
        <a href="request-password-reset">I forgot my password</a><br>

    </div>
    <!-- /.login-box-body -->
</div><!-- /.login-box -->

<script src="../../../web/js/jquery.min.js"></script>
<script type="text/javascript">
function Tryagain()
{
    $("#as_captcha").attr("src", "../../../views/site/captcha.php?"+(new Date()).getTime());            
    $("#captcha").val('') ;
        $("#frgtPassLink").click(function(){
            $('#divErrorGlobal').hide();
        });
}
Tryagain();


</script>