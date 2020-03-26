<?php
/**
 * Created by PhpStorm.
 * User: dmitri
 * Date: 26/03/2020
 * Time: 17:06
 */

namespace shop\Exchange_1C\Model;


use yii\db\ActiveRecord;

class PriceTypeModel extends ActiveRecord
{
    public static function createByMl($type)
    {
        if (!$priceType = self::findOne(['accounting_id' => $type->id])) {
            $priceType = new self;
            $priceType->accounting_id = $type->id;
        }
        $priceType->name = $type->name;
        $priceType->currency = (string)$type->Валюта;
        if ($priceType->getDirtyAttributes()) {
            $priceType->save();
        }
        return $priceType;
    }

    public static function tableName(): string
    {
        return '{{%shop_price_type_1c}}';
    }

    public function transactions():array
    {
        return [
            self::SCENARIO_DEFAULT => self::OP_ALL,
        ];
    }
}