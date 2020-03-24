<?php

namespace shop\Exchange_1C;



use carono\exchange1c\interfaces\ProductInterface;
use shop\Exchange_1C\Model\CategoryModel1C;
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

    }

    public function addImage1c($path, $caption)
    {

    }

    public function getGroup1c()
    {

    }

    public static function createProperties1c($properties)
    {



//        foreach ($properties as $property) {
////            $propertyModel = Property::createByMl($property);
//           // file_put_contents(\Yii::getAlias('@frontend').'/runtime/test.log', $property->value."\n",FILE_APPEND);
//           foreach ($property->getAvailableValues() as $value) {
//
////               // if (!$propertyValue = PropertyValue::findOne(['accounting_id' => $value->id])) {
////                    //$propertyValue = new PropertyValue();
////                    //$propertyValue->name = (string)$value->Значение;
////                    //$propertyValue->property_id = $propertyModel->id;
////                    //$propertyValue->accounting_id = (string)$value->ИдЗначения;
////                    //$propertyValue->save();
////                  //  unset($propertyValue);
////               // }
//                file_put_contents(\Yii::getAlias('@frontend').'/runtime/test.log', (string)$value->Значение.(string)$value->ИдЗначения."\n",FILE_APPEND);
//            }
//       }
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
       //file_put_contents(\Yii::getAlias('@frontend').'/runtime/test.log',"ID: $this->id __ $requisite->id __ $value\n",FILE_APPEND);
    }

    public function setRaw1cData($cml, $product)
    {

    }



    public function afterUpdateProductTest()
    {
        $products = Product::find()->all();
        foreach ($products as $product) {
            file_put_contents(\Yii::getAlias('@frontend') . '/runtime/test.log', $product->name . "\n", FILE_APPEND);
        }
    }

    public function transactions()
    {
        return [
            self::SCENARIO_DEFAULT => self::OP_ALL,
        ];
    }


}