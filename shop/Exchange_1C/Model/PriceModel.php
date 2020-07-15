<?php
/**
 * Created by PhpStorm.
 * User: dmitri
 * Date: 26/03/2020
 * Time: 17:16
 */

namespace shop\Exchange_1C\Model;


use shop\Exchange_1C\Offer;
use yii\db\ActiveRecord;

class PriceModel extends ActiveRecord
{
    public static function createByMl($price, Offer $offer, $type)
    {
        file_put_contents(\Yii::getAlias('@frontend') . '/runtime/PvOfferPrice.log', is_object($type) . "\n", FILE_APPEND);
        if (is_object($type)){
            $typeId = $type->id;
            $priceModel = $offer->getPrices()->andWhere(['type_id' => $type->id])->one();
        }
        else
        {
            $typeId = null;
            $priceModel = $offer->getPrices()->one();
        }

        if (!$priceModel) {
            $priceModel = new self();
        }

        $priceModel->value = $price->cost;
        $priceModel->performance = $price->performance;
        $priceModel->currency = $price->currency;
        $priceModel->rate = $price->rate;
        $priceModel->type_id = $typeId;
        $priceModel->save();
        return $priceModel;
    }

    public static function tableName(): string
    {
        return '{{%shop_price_1c}}';
    }

    public function transactions():array
    {
        return [
            self::SCENARIO_DEFAULT => self::OP_ALL,
        ];
    }
}