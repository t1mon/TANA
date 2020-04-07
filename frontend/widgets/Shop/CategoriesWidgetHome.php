<?php

namespace frontend\widgets\Shop;

use shop\entities\Shop\Category;
use shop\readModels\Shop\CategoryReadRepository;
use shop\readModels\Shop\views\CategoryView;
use yii\base\Widget;
use yii\helpers\Html;

class CategoriesWidgetHome extends Widget
{
    /** @var Category|null */
    public $active;

    private $categories;

    public function __construct(CategoryReadRepository $categories, $config = [])
    {
        parent::__construct($config);
        $this->categories = $categories;
    }

    public function run(): string
    {
        $categories = Category::find()->andWhere(['>', 'depth', 0])->orderBy('lft')->andWhere(['depth' => 1])->all();

        return $this->render('categories-home', [
            'categories' => $categories,'home'=>$this
        ]);

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