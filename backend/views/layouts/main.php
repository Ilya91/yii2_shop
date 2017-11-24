<?php
use yii\helpers\Html;
use lo\modules\noty\Wrapper;


/* @var $this \yii\web\View */
/* @var $content string */

backend\assets\AppAsset::register($this);

dmstr\web\AdminLteAsset::register($this);

$directoryAsset = Yii::$app->assetManager->getPublishedUrl('@vendor/almasaeed2010/adminlte/dist');
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="hold-transition skin-blue sidebar-mini">
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
<?= Wrapper::widget([
	    'layerClass' => 'lo\modules\noty\layers\BootstrapNotify',
	    // default options
	    'options' => [
		    'newest_on_top' => false,
		    'showProgressbar' => false,
		    'placement' => [
			    'from' => 'top',
			    'align' => 'right'
		    ]

		    // and more for this library here https://github.com/mouse0270/bootstrap-notify
	    ],
    ]);
?>
    <?= $this->render(
        'content.php',
        ['content' => $content, 'directoryAsset' => $directoryAsset]
    ) ?>

</div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
