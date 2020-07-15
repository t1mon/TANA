<?php


namespace shop\Exchange_1C;


use carono\exchange1c\interfaces\OfferInterface;
use shop\Exchange_1C\Model\PriceModel;
use shop\Exchange_1C\Model\PriceTypeModel;
use shop\Exchange_1C\Model\PvOfferPriceModel;
use shop\Exchange_1C\Model\PvOfferSpecificationModel;
use shop\Exchange_1C\Model\SpecificationModel;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

class Offer extends ActiveRecord implements OfferInterface
{
    public function getGroup1c()
    {

    }

    public function setPrice1c($price)
    {
        $priceType =  !PriceTypeModel::findOne(['accounting_id' => $price->getType()->id]) ?: null;
        $priceModel = PriceModel::createByMl($price, $this, $priceType);
        if (!PvOfferPriceModel::findOne(['offer_id' => $this->id ])) {
            $PvOfferPrice = new PvOfferPriceModel();
            $PvOfferPrice->offer_id = $this->id;
            $PvOfferPrice->price_id = $priceModel->id;
            $PvOfferPrice->save();
        }

    }


    public static function createPriceTypes1c($types)
    {
        //file_put_contents(\Yii::getAlias('@frontend') . '/runtime/test.log', $type-> . "\n", FILE_APPEND);
        foreach ($types as $type) {
            PriceTypeModel::createByMl($type);
        }
       // unset($types);
    }



    public function setSpecification1c($specification)
    {
        $specificationModel = SpecificationModel::createByMl($specification);
        if (!PvOfferSpecificationModel::find()->andWhere(['offer_id' => $this->id, 'specification_id' =>$specificationModel->id])->one()){
            $PvOfferSpecification = new PvOfferSpecificationModel();
            $PvOfferSpecification->offer_id = $this->id;
            $PvOfferSpecification->specification_id = $specificationModel->id;
            $PvOfferSpecification->value = (string)$specification->Значение;
            $PvOfferSpecification->save();
        }
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
        $offerModel->remnant = (int)$offer->Количество;
        return $offerModel;
    }

    public function getPrices():ActiveQuery
    {
        return $this->hasMany(PriceModel::class,['id' => 'id']);
    }

    public function getPrice()
    {
        return $this->hasOne(PriceModel::class, ['id' => 'id']);
    }

    public function getOfferspecifications(){
        return $this->hasMany(PvOfferSpecificationModel::className(),['offer_id' => 'id']);
    }

    public static function tableName(): string
    {
        return '{{%shop_offer_1c}}';
    }
    public static function getIdFieldName1c()
    {

        return 'accounting_id';
    }

    public function transactions():array
    {
        return [
            self::SCENARIO_DEFAULT => self::OP_ALL,
        ];
    }

}