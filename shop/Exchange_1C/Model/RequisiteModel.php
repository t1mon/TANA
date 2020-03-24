<?php

namespace shop\Exchange_1C\Model;

use yii\db\ActiveRecord;

class RequisiteModel extends ActiveRecord
{

    public static function tableName(): string
    {
        return '{{%shop_requisite_1c}}';
    }

    public function transactions()
    {
        return [
            self::SCENARIO_DEFAULT => self::OP_ALL,
        ];
    }
}