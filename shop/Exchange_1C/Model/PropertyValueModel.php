<?php
/**
 * Created by PhpStorm.
 * User: dmitri
 * Date: 25/03/2020
 * Time: 18:04
 */

namespace shop\Exchange_1C\Model;


use yii\db\ActiveRecord;

class PropertyValueModel extends ActiveRecord
{
    public static function tableName(): string
    {
        return '{{%shop_property_value_1c}}';
    }
}