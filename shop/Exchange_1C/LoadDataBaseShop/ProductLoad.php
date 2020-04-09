<?php
namespace shop\Exchange_1C\LoadDataBaseShop;

use shop\entities\Meta;
use shop\entities\Shop\Brand;
use shop\entities\Shop\Characteristic;
use shop\entities\Shop\Product\Modification;
use shop\Exchange_1C\Model\PriceModel;
use shop\Exchange_1C\Model\PropertyModel;
use shop\Exchange_1C\Model\PvOfferPriceModel;
use shop\Exchange_1C\Model\PvProductPropertyModel;
use shop\Exchange_1C\Model\SpecificationModel;
use shop\Exchange_1C\Offer;
use shop\Exchange_1C\Product;
use shop\forms\manage\Shop\BrandForm;
use shop\forms\manage\Shop\CharacteristicForm;
use shop\forms\manage\Shop\Product\ProductCreateForm;
use shop\useCases\manage\Shop\BrandManageService;
use shop\useCases\manage\Shop\ProductManageService;
use yii\helpers\Inflector;

class ProductLoad
{
    private $brand;

    public function __construct(BrandManageService $brand)
    {
        $this->brand = $brand;
    }

    /* Событие после парсинга всех продуктов */
    public function afterProductSync()
    {
        //$product = Product::find()->orderBy('id DESC')->one();
        /* $products = Product::find()->orderBy('id ASC')->all();
         foreach ($products as $product) {
             $category = $product->group1c->id;
             file_put_contents(\Yii::getAlias('@frontend') . '/runtime/test.log', $product->name ." : ". $category . "\n", FILE_APPEND);
         } */
//        $form = new ProductCreateForm();
//        $form->code = $product->article;
//        $form->name = $product->name;

        //file_put_contents(\Yii::getAlias('@frontend') . '/runtime/test.log', "ALL::::::::Продукты загружены" . "\n", FILE_APPEND);
    }
    /* Событие после парсинга продукта */
    public function afterUpdateProduct()
    {
        //file_put_contents(\Yii::getAlias('@frontend') . '/runtime/test.log', "--Продукт загружен--" . "\n", FILE_APPEND);
    }

    /* Событие после парсинга всех предложений */
    /* По очереди вызываем методы записи бренда, установки свойств, записи продуктов */
    public function afterOfferSync()
    {

        //self::updateRemnant();

        self::loadBrand();
        self::loadCharacteristic();
        //self::loadProduct();
        //self::loadModification();

    }


    /* Событие после парсинга предложения */
    public function afterUpdateOffer()
    {
        //file_put_contents(\Yii::getAlias('@frontend') . '/runtime/test.log', "::Предложение загружено" . "\n", FILE_APPEND);
    }

    /* Событие, которое вызывается после загрузки архива или xml файла от 1С на ваш сайт */

    public function afterFinishUploadFile()
    {
        //file_put_contents(\Yii::getAlias('@frontend') . '/runtime/test.log', "_______Файд загружен на сервер" . "\n", FILE_APPEND);
    }

    /* Работа с Магазином */

    public static function updateRemnant()
    {
        $products = Product::find()->all();
        foreach ($products as $product){
            $remnant = 0;
            foreach ($product->offers as $offer){
                $remnant+= $offer->remnant;
            }
            $product->updateAttributes(['remnant' => $remnant]);
            if ($remnant === null){$remnant = 0;}

            if ($remnant > 0 )
            {
                $product->updateAttributes(['is_active' => 1]);
                \shop\entities\Shop\Product\Product::findOne(['id' => $product->id])->updateAttributes(['quantity' => $remnant,'status' => 1]);
            }
            else
            {
                $product->updateAttributes(['is_active' => 0]);
                \shop\entities\Shop\Product\Product::findOne(['id' => $product->id])->updateAttributes(['quantity' => $remnant,'status' => 0]);
            }

        }
    }

    public static function loadBrand()
    {
        /* Хардкордно закодировано свойство, по которому загружаем бренды (условие работы имеенно с магазином ТАНА )*/
        $data = array();
        $property = PropertyModel::find()->andWhere(['name' => 'Торговая марка'])->one();
        foreach ($property->properties as $value)
        {
//            $brands = Brand::find()->andWhere(['name' => $value->name])->one();
//            if (!$brands) {
//                try {
//                    $brand = Brand::create($value->name, Inflector::slug($value->name), new Meta('', '', ''));
//                    $brand->save();
//                } catch (\DomainException $e) {
//                    \Yii::$app->errorHandler->logException($e);
//                }
//            }
            $brands = Brand::find()->andWhere(['name' => $value->name])->one();
            if (!$brands) {
                $data [] = [
                    $value->name,
                    Inflector::slug($value->name),
                    json_encode( new Meta('', '', ''))
                ];
            }
        }
        \Yii::$app->db->createCommand()->batchInsert('shop_brands', ['name', 'slug', 'meta_json'], $data)->execute();
    }

    public static function loadCharacteristic()
    {
        $data = [];
        $characteristics = SpecificationModel::find()->all();
        foreach ($characteristics as $c){
//            if (!Characteristic::find()->andWhere(['name' => $c->name])->one()) {
//                $characteristic = Characteristic::create(
//                    $c->name,
//                    Characteristic::TYPE_STRING,
//                    0,
//                    '',
//                    [],
//                    0
//                );
//                $characteristic->save();
//            }
            if (!Characteristic::find()->andWhere(['name' => $c->name])->one()) {
                $data [] = [$c->name, Characteristic::TYPE_STRING, 0, '', json_encode([]), 0];
            }
        }
        \Yii::$app->db->createCommand()->batchInsert('shop_characteristics', ['name', 'type', 'required','default','variants_json','sort'], $data)->execute();
    }

    public static function loadProduct()
    {
        $products = Product::find()->all();

        foreach ($products as $product) {
            $idTM = $product->getPropertyTM();
            $brand = PvProductPropertyModel::find()->andWhere(['product_id' => $product->id])->andWhere(['property_id' => $idTM])->one();
            $brandId = !empty($brand['property_value_id']) ? $brand['property_value_id'] : 1;
            //file_put_contents(\Yii::getAlias('@frontend') . '/runtime/test.log', $brandId . "\n", FILE_APPEND);
            if (!\shop\entities\Shop\Product\Product::find()->andWhere(['name' => $product->name])->one())
            {
                $p = \shop\entities\Shop\Product\Product::create(
                    $brandId,
                    ++$product->group_id,
                    $product->article,
                    $product->name,
                    $product->description,
                    0,
                    $product->remnant ?:0 ,
                    new Meta('','',''),
                    Inflector::slug($product->name)
                );
                //if ($product->remnant > 0) { $p->isActive();}
                //$p->status = \shop\entities\Shop\Product\Product::STATUS_ACTIVE;
                $p->save();

            }
        }
    }

    public static function loadModification()
    {
        $products = Product::find()->all();
        foreach ($products as $product){
            if ($offers = $product->offers){
                foreach ($offers as $offer)
                {
                    if ($offer->remnant) {
                        $priceId = PvOfferPriceModel::find()->andWhere(['offer_id' => $offer->id])->one()['price_id'];
                        $price = PriceModel::findOne(['id' => $priceId]);
                        if (!$modification = Modification::find()->andWhere(['code' => $offer->accounting_id])->one()) {
                            $modification = Modification::create(
                                $offer->accounting_id,
                                $offer->name,
                                $price['value'],
                                $offer->remnant
                            );
                            $modification->product_id = $product->id;
                        }
                        $modification->updateAttributes(['quantity' => $offer->remnant]);
                        $modification->save();
                    }
                    //file_put_contents(\Yii::getAlias('@frontend') . '/runtime/test.log', $offer->remnant . "\n", FILE_APPEND);
                }
            }
        }
    }
}