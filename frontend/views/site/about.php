<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'About';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>This is the About page. You may modify the following file to customize its content:</p>
    <?php
        //var_dump(Yii::$app->params);
        //var_dump(Yii::$container);
        //var_dump(Yii::$app->urlManager);
    $user = \common\models\User::findOne(['id' => 12]);
    //$user->getNetworks();
    var_dump($user->networks);

    ?>

    <code><?= __FILE__ ?></code>
</div>
