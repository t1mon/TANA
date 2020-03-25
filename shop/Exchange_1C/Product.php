<?php

namespace shop\Exchange_1C;



use carono\exchange1c\interfaces\ProductInterface;
use shop\Exchange_1C\Model\CategoryModel1C;
use shop\Exchange_1C\Model\PropertyModel;
use shop\Exchange_1C\Model\PropertyValueModel;
use shop\Exchange_1C\Model\PvProductPropertyModel;
use shop\Exchange_1C\Model\PvProductRequisiteModel;
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
    }

    public function setProperty1c($property)
    {
        $propertyModel = PropertyModel::findOne(['accounting_id' => $property->id]);
        $propertyValue = $property->getValueModel();
        if ($propertyAccountingId = (string)$propertyValue->ИдЗначения) {
            $value = PropertyValueModel::findOne(['accounting_id' => $propertyAccountingId]);
            if (!PvProductPropertyModel::findOne(['value' => $value->name])){
                $PvProductProperty = new PvProductPropertyModel();
                $PvProductProperty->product_id = $this->id;
                $PvProductProperty->property_id = $propertyModel->id;
                $PvProductProperty->property_value_id = $value->id;
                $PvProductProperty->value =  $value->name;
                $PvProductProperty->save();
            }
        }
    }

    public function addImage1c($path, $caption)
    {

    }

    public function getGroup1c()
    {

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
                        unset($propertyValue);
                    }
            }
        }
    }

    public function getOffer1c($offer)
    {
        $offerModel = Offer::createByMl($offer);
//        $offerModel->product_id = $this->id;
//        if ($offerModel->getDirtyAttributes()) {
//            $offerModel->save();
//        }
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
        return $model;

    }
    public function setRequisite1c($name, $value)
    {
        if (!$requisite = RequisiteModel::findOne(['name' => $name])) {
            $requisite = new RequisiteModel();
            $requisite->name = $name;
            $requisite->save();
        }
        $requisiteProduct = new PvProductRequisiteModel();
        $requisiteProduct->product_id = $this->id;
        $requisiteProduct->requisite_id = $requisite->id;
        $requisiteProduct->value = $value;
        $requisiteProduct->save();
    }

    public function setRaw1cData($cml, $product)
    {

    }



    public function afterUpdateProductTest()
    {
//        $products = Product::find()->all();
//        foreach ($products as $product) {
//            file_put_contents(\Yii::getAlias('@frontend') . '/runtime/test.log', $product->name . "\n", FILE_APPEND);
//        }
    }

    public function transactions()
    {
        return [
            self::SCENARIO_DEFAULT => self::OP_ALL,
        ];
    }


}