<?php
namespace shop\Exchange_1C\repositories;

use shop\entities\Meta;
use shop\entities\Shop\Brand;
use shop\entities\Shop\Characteristic;
use shop\entities\Shop\Product\Modification;
use shop\Exchange_1C\Model\PriceModel;
use shop\Exchange_1C\Model\PropertyModel;
use shop\Exchange_1C\Model\PropertyValueModel;
use shop\Exchange_1C\Model\PvOfferPriceModel;
use shop\Exchange_1C\Model\PvProductPropertyModel;
use shop\Exchange_1C\Model\SpecificationModel;
use shop\Exchange_1C\Product;
use yii\helpers\Inflector;
use yii\helpers\VarDumper;


class ExchangeRepository
{

    public function loadBrand()
    {
        /* Хардкордно закодировано свойство, по которому загружаем бренды (условие работы имеенно с магазином ТАНА )*/
        $data = array();
        $property = PropertyModel::find()->andWhere(['name' => 'Торговая марка'])->one();

        foreach ($property->properties as $value)
        {
            $brands = Brand::find()->andWhere(['accounting_id' => $value->accounting_id])->one();
            if (!$brands) {
                $data [] = [
                    $value->name,
                    Inflector::slug($value->name),
                    json_encode( new Meta('', '', '')),
                    $value->accounting_id
                ];
            }
        }
        \Yii::$app->db->createCommand()->batchInsert('shop_brands', ['name', 'slug', 'meta_json','accounting_id'], $data)->execute();
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

    public function worksShop()
    {

        $products = Product::find()->andWhere(['updated_at' => 0])->each();
        foreach ($products as $product){
            $this->updateRemnant($product);
            $this->insertOrUpdateProduct($product);
            $product->updateAttributes(['updated_at' => 0]);
        }
    }


    protected function updateRemnant(Product $product)
    {
        $remnant = 0;
        foreach ($product->offers as $offer){
            $remnant+= (int)$offer->remnant;
        }
        $active = $remnant > 0 ? 1 : 0;
        $product->updateAttributes(['remnant' => $remnant, 'is_active'=>$active]);
        unset($product);
    }

    private function insertOrUpdateProduct(Product $product)
    {   $transaction = \shop\entities\Shop\Product\Product::getDb()->beginTransaction();
        $idTM = $product->getPropertyTM();
        $categoryId = $product->group1c->category->id;
        $brand = PvProductPropertyModel::find()->andWhere(['product_id' => $product->id])->andWhere(['property_id' => $idTM])->one();
        //$brandId = !empty($brand['property_value_id']) ? $brand['property_value_id'] : 1;
        $accounting_id = PropertyValueModel::findOne($brand['property_value_id'])['accounting_id'];
        $brandId = Brand::find()->andWhere(['accounting_id' =>$accounting_id])->one()->id ?? Brand::find()->one()->id;
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
            $this->insertOrUpdateModification($product);
            $transaction->commit();
        } catch (\Throwable $e){
            $transaction->rollBack();
            throw $e;
        }

    }

    private function insertOrUpdateModification(Product $product)
    {
        $_productId = \shop\entities\Shop\Product\Product::find()->andWhere(['accounting_id' => $product->accounting_id])->one()->id;
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
                        $modification->product_id = $_productId;
                        //$modification->product_id = $product->id;
                    }
                    $p [] = $price['value'];
                    $modification->quantity = $offer->remnant;
                    $modification->price = $price['value'];
                    $modification->save();
                }
            }
        }
        $p = !empty($p) ?  min($p) : 0;
        $product->updateAttributes(['price' => $p]);
        \shop\entities\Shop\Product\Product::findOne(['id' => $_productId])->updateAttributes(['price_new' => $p]);
    }

}