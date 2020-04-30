<?php
/**
 * Created by PhpStorm.
 * User: dmitri
 * Date: 29/04/2020
 * Time: 17:13
 */

namespace console\controllers;

use shop\entities\Shop\Brand;
use shop\entities\Shop\Characteristic;
use shop\entities\Shop\Product\Product;
use shop\Exchange_1C\repositories\ExchangeRepository;
use yii\console\Controller;

class ExcController extends Controller
{
    private $repos;

    public function __construct($id,  $module, ExchangeRepository $repos, array $config = [])
    {
        $this->repos = $repos;
        parent::__construct($id, $module, $config);
    }

    public function actionLoad()
    {
        $this->repos->loadBrand();
        $this->stdout('Brand Loaded DONE'.PHP_EOL);

        $this->repos->loadCharacteristic();
        $this->stdout('Characteristics Loaded DONE'.PHP_EOL);

        $this->repos->worksShop();
        $this->stdout('WorkShop DONE'.PHP_EOL);
    }


    public function actionDelete22()
    {
        Product::deleteAll();
        Characteristic::deleteAll();
        Brand::deleteAll();
    }

}