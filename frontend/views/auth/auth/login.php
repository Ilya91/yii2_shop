<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>


<div class="breadcrumb-box">
    <a href="#">Home</a>
    <a href="#">Login Form</a>
</div>

<div class="information-blocks">
    <div class="row">
        <div class="col-sm-6 information-entry">
            <div class="login-box">
                <div class="article-container style-1">
                    <h3>Registered Customers</h3>
                    <p>Lorem ipsum dolor amet, conse adipiscing, eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                </div>
                <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

                <?= $form->field($model, 'username')->textInput(['autofocus' => true, 'class' => 'simple-field']) ?>

                <?= $form->field($model, 'password')->passwordInput(['class' => 'simple-field']) ?>

                <?= $form->field($model, 'rememberMe')->checkbox() ?>

                <div style="color:#999;margin:1em 0">
                    If you forgot your password you can <?= Html::a('reset it', ['/auth/reset/request']) ?>.
                </div>
                <div class="button style-10">Login Page<input type="submit" value="" name="login-button"/></div>
                <?php ActiveForm::end(); ?>


                <h2>Socials</h2>
                <?= yii\authclient\widgets\AuthChoice::widget([
                    'baseAuthUrl' => ['auth/network/auth']
                ]); ?>
            </div>
        </div>
        <div class="col-sm-6 information-entry">
            <div class="login-box">
                <div class="article-container style-1">
                    <h3>New Customers</h3>
                    <p>By creating an account with our store, you will be able to move through the checkout process faster, store multiple shipping addresses, view and track your orders in your account and more.</p>
                </div>
                <a class="button style-12">Register Account</a>
            </div>
        </div>
    </div>
</div>