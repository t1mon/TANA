<?php
namespace shop\Exchange_1C\LoadDataBaseShop;

use shop\Exchange_1C\Product;
use shop\forms\manage\Shop\Product\ProductCreateForm;
use shop\useCases\manage\Shop\ProductManageService;

class ProductLoad
{
    private $service;

    public function __construct(ProductManageService $service)
    {
        $this->service = $service;
    }

    public function afterUpdateProduct()
    {
        $product = Product::find()->orderBy('id DESC')->one();
        $category = $product->group1c->id;

//        $form = new ProductCreateForm();
//        $form->code = $product->article;
//        $form->name = $product->name;

        file_put_contents(\Yii::getAlias('@frontend') . '/runtime/test.log', $product->name ." : ". $category . "\n", FILE_APPEND);
    }

}