<?php
/**
 * Created by PhpStorm.
 * User: dmitri
 * Date: 14/03/2020
 * Time: 21:48
 */

namespace frontend\urls;


use yii\web\UrlRule;
use carono\exchange1c\helpers\ModuleHelper;

class ExchangeUrlRule extends UrlRule
{
    public $route = 'exchange/api/<mode>';
    public $pattern = '1c_exchange';

    public function init()
    {
        $this->route = ModuleHelper::getModuleNameByClass('carono\exchange1c\ExchangeModule', 'exchange') . '/api/<mode>';
        parent::init();
    }

    public function parseRequest($manager, $request)
    {
        $this->defaults = ['mode' => \Yii::$app->request->get('mode', 'error')];
        return parent::parseRequest($manager, $request);
    }
}