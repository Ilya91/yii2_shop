<?php

namespace backend\assets;

use yii\web\AssetBundle;
use yii\web\View;

/**
 * Main backend application asset bundle.
 */
class TagsAsset extends AssetBundle
{
	public $basePath = '@webroot';
	public $baseUrl = '@web';

	public $js = [
		'js/Tags.js',
	];
	public $jsOptions = [
		'position' => View::POS_END
	];
	public $depends   = [
		'yii\web\JqueryAsset',
	];
}
