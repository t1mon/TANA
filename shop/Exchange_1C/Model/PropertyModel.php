<?php
/**
 * Created by PhpStorm.
 * User: dmitri
 * Date: 25/03/2020
 * Time: 17:56
 */

namespace shop\Exchange_1C\Model;


use yii\db\ActiveRecord;

class PropertyModel extends ActiveRecord
{
    public static function tableName(): string
    {
        return '{{%shop_property_1c}}';
    }

    public static function createByMl($property)
    {
//         if (!$propertyValue = PropertyValue::findOne(['accounting_id' => $value->id])) {
//                    $propertyValue = new PropertyValue();
//                    $propertyValue->name = (string)$value->Значение;
//                    $propertyValue->property_id = $propertyModel->id;
//                    $propertyValue->accounting_id = (string)$value->ИдЗначения;
//                    $propertyValue->save();
//                    unset($propertyValue);
//                }
        if (!$propertyModel = self::findOne(['accounting_id' => $property->id])) {
            $propertyModel = new self;
            $propertyModel->name = (string)$property->name;
            $propertyModel->accounting_id = (string)$property->id;
            $propertyModel->save();
        }
        return $propertyModel;
    }

    public function getProperties()
    {
        return $this->hasMany(PropertyValueModel::class,['property_id' => 'id']);
    }
    public function transactions():array
    {
        return [
            self::SCENARIO_DEFAULT => self::OP_ALL,
        ];
    }
}