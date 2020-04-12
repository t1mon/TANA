<?php
/**
 * Created by PhpStorm.
 * User: dmitri
 * Date: 12/04/2020
 * Time: 17:59
 */

namespace frontend\assets;


use yii\web\AssetBundle;

class JgrowlAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        '//cdnjs.cloudflare.com/ajax/libs/jquery-jgrowl/1.4.7/jquery.jgrowl.min.css',
        'css/jgrowl-style.css'
    ];
    public $js = [
        '//cdnjs.cloudflare.com/ajax/libs/jquery-jgrowl/1.4.7/jquery.jgrowl.min.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap4\BootstrapPluginAsset',
    ];

}