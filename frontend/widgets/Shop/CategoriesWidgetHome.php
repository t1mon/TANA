<?php

namespace frontend\widgets\Shop;

use shop\entities\Shop\Category;
use shop\readModels\Shop\CategoryReadRepository;
use shop\readModels\Shop\views\CategoryView;
use yii\base\Widget;
use yii\caching\Cache;
use yii\helpers\Html;
use yii\helpers\VarDumper;

class CategoriesWidgetHome extends Widget
{
    private $cache;

    public function __construct(Cache $cache,array $config = [])
    {
        $this->cache = $cache;
        parent::__construct($config);
    }


    public function run(): string
    {

        $tree = Category::findOne(1)->tree();
        $menuHtml = $this->getMenuHtml($tree[0]['children']);
//        return $this->cache->getOrSet('widgetHome', function () use ($menuHtml) {
//
//             return $menuHtml;
//        });
        return $menuHtml;

    }

    protected function getMenuHtml($tree)
    {
        $str = '';
        foreach ($tree as $category){
            $str .= $this->catToTemplate($category);
        }
        return $str;
    }

    protected function catToTemplate($category)
    {
        //ob_start();
        include __DIR__ . '/menu_tpl/' . 'menu.php';
        //return ob_get_clean();

    }

}