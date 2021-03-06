<?php

namespace shop\Exchange_1C\Model;


use yii\db\ActiveRecord;

class PvOfferPriceModel extends ActiveRecord
{

    public function getPrice()
    {
        return $this->hasOne(PriceModel::class, ['price_id' => 'id']);
    }

    public static function tableName(): string
    {
        return '{{%shop_pv_offer_prices_1c}}';
    }

    public function transactions():array
    {
        return [
            self::SCENARIO_DEFAULT => self::OP_ALL,
        ];
    }
}