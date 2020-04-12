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
        'css/icons.min.css',
        'css/plugins.css',
        'css/style.css',
        'css/settings.css',
       //'//cdnjs.cloudflare.com/ajax/libs/jquery-jgrowl/1.4.7/jquery.jgrowl.min.css',
    ];
    public $js = [
        'js/vendor/modernizr-2.8.3.min.js',
        'js/popper.min.js',
        'js/plugins.js',
        'js/main.js',
        //'//cdnjs.cloudflare.com/ajax/libs/jquery-jgrowl/1.4.7/jquery.jgrowl.min.js',
    ];
    public $depends = [
        //'yii\web\YiiAsset',
        //'yii\bootstrap4\BootstrapAsset',
        //'yii\bootstrap4\BootstrapPluginAsset',
        //'frontend\assets\FontAwesomeAsset',
        'yii\web\YiiAsset',
        'yii\bootstrap4\BootstrapPluginAsset', // подключение Bootstrap

    ];
}
