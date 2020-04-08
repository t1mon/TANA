<?php

namespace frontend\widgets\Shop;

use shop\entities\Shop\Category;
use shop\readModels\Shop\CategoryReadRepository;
use shop\readModels\Shop\views\CategoryView;
use yii\base\Widget;
use yii\helpers\Html;

class CategoriesWidgetHome extends Widget
{
    public $tpl;
    public $tree;
    public $menuHtml;


    public function run(): string
    {
        $categories = Category::find()->andWhere(['>', 'depth', 0])->orderBy('lft')->andWhere(['depth' => 1])->all();
//        $this->tree = Category::findOne(1)->tree();
//        $this->menuHtml = $this->getMenuHtml($this->tree[0]['children']);
        //echo  $test[0]['children'][0]['id'];



        return $this->render('categories-home', [
            'categories' => $categories,'home'=>$this
        ]);

        //return $this->menuHtml;
    }

    protected function getMenuHtml($tree)
    {
        $str = '';
        foreach ($tree as $category=>$item){
            $str .= $this->catToTemplate($item);
        }
        return $str;
    }

    protected function catToTemplate($category)
    {
        ob_start();
        include __DIR__ . '/menu_tpl/' . 'menu.php';
        return ob_get_clean();
    }

    public function cate($category)
    {
        foreach ($category->getChildren()->all() as $child) {
            echo "<li>";
            if ($child->getChildren()->all()) {
                echo "<a href='#'>" . $child->name . "</a>";
                echo "<ul>";
                $this->cate($child);
                echo "</ul>";
            } else {
                echo "<a href='" . \yii\helpers\Url::to(['/shop/catalog/category', 'id' => $child->id]) . "'>" . $child->name . "</a>";
            }
            echo "</li>";
        }
    }
}