<?php

namespace frontend\assets;

use yii\web\AssetBundle;
use yii\web\View;

/**
 * Main frontend application asset bundle.
 */
class MetisMenuAsset extends AssetBundle
{
    public $sourcePath = '@npm/metismenu';

    public $js = [
	    'https://cdn.jsdelivr.net/npm/metismenu'
    ];
	public $jsOptions = [
		'position' => View::POS_END
	];
	public $depends   = [
		'yii\web\JqueryAsset',
		'yii\bootstrap\BootstrapAsset',
	];
}
