<?php
namespace shop\Exchange_1C\LoadDataBaseShop;

use shop\entities\Meta;
use shop\entities\Shop\Brand;
use shop\entities\Shop\Category;
use shop\entities\Shop\Characteristic;
use shop\entities\Shop\Product\Modification;
use shop\Exchange_1C\Model\CategoryModel1C;
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
use shop\services\TransactionManager;
use shop\useCases\manage\Shop\BrandManageService;
use shop\useCases\manage\Shop\ProductManageService;
use yii\helpers\Inflector;
use yii\helpers\VarDumper;

class ProductLoad
{

    /* Событие после парсинга всех продуктов */
    public function afterProductSync()
    {
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
        //self::loadBrand();
        //self::loadCharacteristic();
        //self::work();
        if (file_exists(\Yii::getAlias('@frontend') . '/runtime/work.log')){
            unlink(\Yii::getAlias('@frontend') . '/runtime/work.log');
        }
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
        file_put_contents(\Yii::getAlias('@frontend') . '/runtime/work.log', "::Начало работы" . "\n", FILE_APPEND);
    }

    /* Работа с Магазином */

    public function work()
    {

        $products = Product::find()->each();
        foreach ($products as $product){
            self::updateRemnant($product);
            self::insertOrUpdateProduct($product);
        }
        if (file_exists(\Yii::getAlias('@frontend') . '/runtime/work.log')){
            unlink(\Yii::getAlias('@frontend') . '/runtime/work.log');
        }

    }

    public function loadBrand()
    {
        /* Хардкордно закодировано свойство, по которому загружаем бренды (условие работы имеенно с магазином ТАНА )*/
        $data = array();
        $property = PropertyModel::find()->andWhere(['name' => 'Торговая марка'])->one();
        foreach ($property->properties as $value)
        {
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

    public function loadCharacteristic()
    {
        $data = [];
        $characteristics = SpecificationModel::find()->each();
        foreach ($characteristics as $c){
            if (!Characteristic::find()->andWhere(['name' => $c->name])->one()) {
                $data [] = [$c->name, Characteristic::TYPE_STRING, 0, '', json_encode([]), 0];
            }
        }
        \Yii::$app->db->createCommand()->batchInsert('shop_characteristics', ['name', 'type', 'required','default','variants_json','sort'], $data)->execute();
    }

   public function updateRemnant(Product $product)
   {
           $remnant = 0;
           foreach ($product->offers as $offer){
               $remnant+= (int)$offer->remnant;
           }
           $active = $remnant > 0 ? 1 : 0;
           $product->updateAttributes(['remnant' => $remnant, 'is_active'=>$active]);
           unset($product);
   }

   public function insertOrUpdateProduct(Product $product)
   {   $transaction = \shop\entities\Shop\Product\Product::getDb()->beginTransaction();
       $idTM = $product->getPropertyTM();
       $categoryId = $product->group1c->category->id;
       $brand = PvProductPropertyModel::find()->andWhere(['product_id' => $product->id])->andWhere(['property_id' => $idTM])->one();
       $brandId = !empty($brand['property_value_id']) ? $brand['property_value_id'] : 1;
       try {
           if (!$p = \shop\entities\Shop\Product\Product::find()->andWhere(['accounting_id' => $product->accounting_id])->one()) {
               $p = \shop\entities\Shop\Product\Product::create(
                   $brandId,
                   $categoryId,
                   $product->article,
                   $product->name,
                   $product->description,
                   0,
                   $product->remnant ?: 0,
                   new Meta('', '', ''),
                   Inflector::slug($product->name)
               );
               $p->accounting_id = $product->accounting_id;
           }
           $p->quantity = $product->remnant ?: 0;
           $p->status = $product->is_active;
           $p->save();
           self::insertOrUpdateModification($product);
           $transaction->commit();
       } catch (\Throwable $e){
           $transaction->rollBack();
           throw $e;
       }

   }

   public function insertOrUpdateModification(Product $product)
   {
       $p = array();
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
                   $p [] = $price['value'];
                   $modification->quantity = $offer->remnant;
                   $modification->save();
               }
           }
       }
       $p = !empty($p) ?  min($p) : 0;
      $product->updateAttributes(['price' => $p]);
      \shop\entities\Shop\Product\Product::findOne(['id' => $product->id])->updateAttributes(['price_new' => $p]);
   }


}