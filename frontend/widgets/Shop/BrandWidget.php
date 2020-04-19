<?php

namespace frontend\widgets\Shop;

use shop\entities\Shop\Brand;
use shop\readModels\Shop\BrandReadRepository;
use shop\repositories\Shop\BrandRepository;
use shop\useCases\manage\Shop\BrandManageService;
use yii\base\Widget;

class BrandWidget extends Widget
{
    private $brand;

    public function __construct(BrandReadRepository $brand, $config = [])
    {
        parent::__construct($config);
        $this->brand = $brand;
    }


    public function run(): string
    {
        if ($brands = $this->brand->getAll()) {
            return $this->render('brand', [
                'brands' => $brands,
            ]);
        }
        return false;
    }
}