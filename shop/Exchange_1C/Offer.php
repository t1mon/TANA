<?php


namespace shop\Exchange_1C;


use carono\exchange1c\interfaces\OfferInterface;
use yii\db\ActiveRecord;

class Offer extends ActiveRecord implements OfferInterface
{
    public function getGroup1c()
    {

    }

    public function setPrice1c($price)
    {

    }


    public static function createPriceTypes1c($types)
    {

    }



    public function setSpecification1c($specification)
    {

    }

    public function getExportFields1c($context = null)
    {

    }

    public static function createByMl($offer)
    {
        if (!$offerModel = self::findOne(['accounting_id' => $offer->id])) {
            $offerModel = new self;
            $offerModel->name = (string)$offer->name;
            $offerModel->accounting_id = (string)$offer->id;
        }
        //$offerModel->remnant = (string)$offer->Количество;
        return $offerModel;
    }

    public static function tableName(): string
    {
        return '{{%shop_product_1c}}';
    }
    public static function getIdFieldName1c()
    {
        return 'accounting_id';
    }
}