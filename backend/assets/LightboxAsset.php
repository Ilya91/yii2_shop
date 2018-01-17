<?php

namespace backend\assets;

use yii\web\AssetBundle;
use yii\web\View;

/**
 * Main backend application asset bundle.
 */
class LightboxAsset extends AssetBundle
{
	public $basePath = '@webroot';
	public $baseUrl = '@web';

	public $js = [
		'js/lightbox.js',
	];

	public $css = [
		'css/fancybox.css',
	];

	public $cssOptions = [
		'position' => View::POS_HEAD
	];
	public $jsOptions = [
		'position' => View::POS_END
	];
	public $depends   = [
		'backend\assets\JQuery',
	];
}
