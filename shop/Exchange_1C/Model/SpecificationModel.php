<?php

namespace shop\Exchange_1C\Model;


use yii\db\ActiveRecord;

class SpecificationModel extends ActiveRecord
{

    public static function createByMl($specification)
    {
        if (!$specificationModel = self::findOne(['name' => $specification->name])) {
            $specificationModel = new self;
            $specificationModel->name = $specification->name;
            $specificationModel->accounting_id = $specification->id;
            $specificationModel->save();
        }
        return $specificationModel;
    }
    public static function tableName(): string
    {
        return '{{%shop_specification_1c}}';
    }

    public function transactions():array
    {
        return [
            self::SCENARIO_DEFAULT => self::OP_ALL,
        ];
    }
}