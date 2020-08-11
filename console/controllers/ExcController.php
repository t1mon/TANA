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
use shop\Exchange_1C\Model\PvOfferPriceModel;
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
        if (!file_exists(\Yii::getAlias('@frontend') . '/runtime/work.log')) {
            $this->repos->loadBrand();
            $this->stdout('Brand Loaded DONE' . PHP_EOL);

            $this->repos->loadCharacteristic();
            $this->stdout('Characteristics Loaded DONE' . PHP_EOL);

            $this->repos->worksShop();
            $this->stdout('WorkShop DONE' . PHP_EOL);
        }
    }


    public function actionPricePvDelete()
    {
        PvOfferPriceModel::deleteAll();
    }

    public function actionDelete22()
    {
        Product::deleteAll();
        Characteristic::deleteAll();
        Brand::deleteAll();
    }

    public function actionTest()
    {
        if (!file_exists(\Yii::getAlias('@frontend') . '/runtime/test.log')){
            file_put_contents(\Yii::getAlias('@frontend') . '/runtime/no.log', "END - ".date("Y-m-d H:i:s") . "\n", FILE_APPEND);
        }else{
            file_put_contents(\Yii::getAlias('@frontend') . '/runtime/yes.log', "END - ".date("Y-m-d H:i:s") . "\n", FILE_APPEND);
        }
    }

}