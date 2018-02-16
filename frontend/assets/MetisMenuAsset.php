<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class MetisMenuAsset extends AssetBundle
{
    public $basePath = '@npm/metismenu/dist';
    //public $baseUrl = '@web';

    public $js = [
        'metisMenu.js',
    ];
    public $depends = [
        'yii\web\YiiAsset'
    ];
}
