<?php

namespace frontend\widgets\Shop;

use shop\entities\Shop\Category;
use shop\readModels\Shop\CategoryReadRepository;
use shop\readModels\Shop\views\CategoryView;
use yii\base\Widget;
use yii\helpers\Html;
use yii\helpers\VarDumper;

class CategoriesWidgetHome extends Widget
{
    public $tpl;
    public $tree;
    public $menuHtml;


    public function run(): string
    {
        $this->tree = Category::findOne(1)->tree();
        $this->menuHtml = $this->getMenuHtml($this->tree[0]['children']);

        return $this->menuHtml;
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