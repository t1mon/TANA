<?php
/**
 * Created by PhpStorm.
 * User: t1mon
 * Date: 11.12.2017
 * Time: 22:59
 */

namespace frontend\assets;


use yii\web\AssetBundle;

class YandexMapsAsset extends AssetBundle
{
    public $jsOptions = ['position' => \yii\web\View::POS_HEAD];
    public $js = [
        '//api-maps.yandex.ru/2.1/?lang=ru_RU&amp;apikey=3356386d-a1c1-4f0c-81a0-6fb1f629f1ea',
    ];

}