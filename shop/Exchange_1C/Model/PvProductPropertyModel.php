<?php
/**
 * Created by PhpStorm.
 * User: dmitri
 * Date: 25/03/2020
 * Time: 18:22
 */

namespace shop\Exchange_1C\Model;


use yii\db\ActiveRecord;

class PvProductPropertyModel extends ActiveRecord
{
    public static function tableName(): string
    {
        return '{{%shop_pv_product_property_1c}}';
    }
}