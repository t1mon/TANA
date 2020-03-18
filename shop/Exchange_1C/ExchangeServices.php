<?php
/**
 * Created by PhpStorm.
 * User: dmitri
 * Date: 18/03/2020
 * Time: 19:44
 */

namespace shop\Exchange_1C;


use shop\entities\Shop\Category;
use shop\forms\manage\Shop\CategoryForm;
use shop\useCases\manage\Shop\CategoryManageService;

class ExchangeServices
{
    private  $category;

    public function __construct(CategoryManageService $category)
    {
        $this->category = $category;

    }

    public function CategoryCreate1c(CategoryForm $form): void
    {
        $this->category->create($form);
    }

}