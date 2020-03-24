<?php
/**
 * Created by PhpStorm.
 * User: dmitri
 * Date: 24/03/2020
 * Time: 19:56
 */

namespace shop\Exchange_1C\Model;


use yii\db\ActiveRecord;

class PvProductRequisiteModel extends ActiveRecord
{

    public static function tableName(): string
    {
        return '{{%shop_pv_product_requisite_1c}}';
    }

    public function transactions()
    {
        return [
            self::SCENARIO_DEFAULT => self::OP_ALL,
        ];
    }
}