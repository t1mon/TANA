<?php

namespace shop\Exchange_1C;



use carono\exchange1c\interfaces\ProductInterface;
use shop\Exchange_1C\Model\CategoryModel1C;
use shop\Exchange_1C\Model\PropertyModel;
use shop\Exchange_1C\Model\PropertyValueModel;
use shop\Exchange_1C\Model\PvProductPropertyModel;
use shop\Exchange_1C\Model\PvProductRequisiteModel;
use shop\Exchange_1C\Model\queue\OfferQueue1C;
use shop\Exchange_1C\Model\queue\ProductQueue1C;
use shop\Exchange_1C\Model\RequisiteModel;
use yii\db\ActiveRecord;

class Product extends ActiveRecord implements ProductInterface
{
    public static function tableName(): string
    {
        return '{{%shop_product_1c}}';
    }

    public static function getIdFieldName1c()
    {
        return 'accounting_id';
    }

    public function setGroup1c($group)
    {
        $id = CategoryModel1C::find()->select(['id'])->andWhere(['accounting_id' => $group->id])->scalar();
        $this->updateAttributes(['group_id' => $id]);
        //unset($group);
    }

    public function setProperty1c($property)
    {
        $propertyModel = PropertyModel::findOne(['accounting_id' => $property->id]);
        $propertyValue = $property->getValueModel();
        if ($propertyAccountingId = (string)$propertyValue->ИдЗначения) {
            $value = PropertyValueModel::findOne(['accounting_id' => $propertyAccountingId]);
            if (!PvProductPropertyModel::findOne(['product_id' => $this->id])){
                $PvProductProperty = new PvProductPropertyModel();
                $PvProductProperty->product_id = $this->id;
                $PvProductProperty->property_id = $propertyModel->id;
                $PvProductProperty->property_value_id = $value->id;
                $PvProductProperty->value =  $value->name;
                $PvProductProperty->save();
                //unset($PvProductProperty);
            }
        }
        //unset($propertyValue);
        //unset($property);
    }

    public function addImage1c($path, $caption)
    {

    }

    public function getGroup1c()
    {
        return $this->hasOne(CategoryModel1C::class, ['id' => 'group_id']);
    }

    public static function createProperties1c($properties)
    {
        foreach ($properties as $property) {
            $propertyModel = PropertyModel::createByMl($property);
            foreach ($property->getAvailableValues() as $value) {
                    if (!$propertyValue = PropertyValueModel::findOne(['accounting_id' => (string)$value->ИдЗначения])) {
                        $propertyValue = new PropertyValueModel();
                        $propertyValue->name = (string)$value->Значение;
                        $propertyValue->property_id = $propertyModel->id;
                        $propertyValue->accounting_id = (string)$value->ИдЗначения;
                        $propertyValue->save();
//                        if ($property->name == "Торговая марка"){
//                            file_put_contents(\Yii::getAlias('@frontend') . '/runtime/test.log', "VALUE---Загружено свойство".(string)$value->Значения . "\n", FILE_APPEND);
//                        }
                        unset($propertyValue);
                    }
            }
            //unset($propertyModel);
        }
        //unset($properties);
    }

    public function getOffer1c($offer)
    {
        $offerModel = Offer::createByMl($offer);
        $offerModel->product_id = $this->id;
        if ($offerModel->getDirtyAttributes()) {
            $offerModel->save();
            //\Yii::$app->queue->push(new OfferQueue1C($offerModel));
        }
        //unset($offer);
        //file_put_contents(\Yii::getAlias('@frontend') . '/runtime/offer.log', serialize($data). "\n", FILE_APPEND);
        return $offerModel;
    }

    public static function createModel1c($product)
    {
        if (!$model = Product::findOne(['accounting_id' => $product->id])) {
            $model = new Product();
            $model->accounting_id = $product->id;
        }
        $model->name = $product->name;
        $model->description = (string)$product->Описание;
        $model->article = (string)$product->Артикул;
        $model->save();
        //unset($product);
        //\Yii::$app->queue->push(new ProductQueue1C($model));
        //file_put_contents(\Yii::getAlias('@frontend') . '/runtime/product.log', serialize($data). "\n", FILE_APPEND);
        return $model;

    }
    public function setRequisite1c($name, $value)
    {
        if (!$requisite = RequisiteModel::findOne(['name' => $name])) {
            $requisite = new RequisiteModel();
            $requisite->name = $name;
            $requisite->save();
        }
        //Пока закоментировано не используется в магазине
//        if (!PvProductRequisiteModel::find()->andWhere(['product_id' => $this->id, 'requisite_id' => $requisite->id])->one()){
//            $requisiteProduct = new PvProductRequisiteModel();
//            $requisiteProduct->product_id = $this->id;
//            $requisiteProduct->requisite_id = $requisite->id;
//            $requisiteProduct->value = $value;
//            $requisiteProduct->save();
//        }
        //unset($requisite);
        //unset($requisiteProduct);
        //unset($name);
        //unset($value);
    }

    public function setRaw1cData($cml, $product)
    {
        unset($cml);
        unset($product);
    }

    public function getOffers()
    {
        return $this->hasMany(Offer::class, ['product_id' => 'id']);
    }

    public function getPropertyTM()
    {
//        $properties = PropertyModel::find()->each();
//        foreach ($properties as $property){
//            if ($property->name == 'Торговая марка'){
//                return $property->id;
//            }
//        }
        return PropertyModel::findOne(['name' => 'Торговая марка'])->id;
    }

    public function transactions()
    {
        return [
            self::SCENARIO_DEFAULT => self::OP_ALL,
        ];
    }


}