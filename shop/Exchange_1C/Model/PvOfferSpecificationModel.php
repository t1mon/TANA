<?php
/**
 * Created by PhpStorm.
 * User: dmitri
 * Date: 26/03/2020
 * Time: 18:48
 */

namespace shop\Exchange_1C\Model;


use yii\db\ActiveRecord;

class PvOfferSpecificationModel extends ActiveRecord
{
    public static function tableName(): string
    {
        return '{{%shop_pv_offer_specification_1c}}';
    }

    public function transactions():array
    {
        return [
            self::SCENARIO_DEFAULT => self::OP_ALL,
        ];
    }
}