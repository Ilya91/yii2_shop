<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/bootstrap.min.css',
        'css/idangerous.swiper.css',
        'css/font-awesome.min.css',
        'http://fonts.googleapis.com/css?family=Raleway:300,400,500,600,700%7CDancing+Script%7CMontserrat:400,700%7CMerriweather:400,300italic%7CLato:400,700,900',
        'css/style.css',
    ];
    public $js = [
        'js/jquery-2.1.3.min.js',
        'js/idangerous.swiper.min.js',
        'js/global.js',
        'js/jquery.mousewheel.js',
        'js/jquery.mousewheel.js',
        'js/jquery.jscrollpane.min.js'
    ];
    public $depends = [
        'yii\web\YiiAsset'
    ];
}
