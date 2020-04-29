<?php
namespace shop\Exchange_1C\LoadDataBaseShop;


class ProductLoad
{

    /* Событие после парсинга всех продуктов */
    public function afterProductSync()
    {

    }
    /* Событие после парсинга продукта */
    public function afterUpdateProduct()
    {

    }

    /* Событие после парсинга всех предложений */

    public function afterOfferSync()
    {
        if (file_exists(\Yii::getAlias('@frontend') . '/runtime/work.log')){
            unlink(\Yii::getAlias('@frontend') . '/runtime/work.log');
        }
        file_put_contents(\Yii::getAlias('@frontend') . '/runtime/time.log', "END - ".date("Y-m-d H:i:s") . "\n", FILE_APPEND);
    }


    /* Событие после парсинга предложения */
    public function afterUpdateOffer()
    {

    }

    /* Событие, которое вызывается после загрузки архива или xml файла от 1С на ваш сайт */

    public function afterFinishUploadFile()
    {
        file_put_contents(\Yii::getAlias('@frontend') . '/runtime/work.log', "::Начало работы" . "\n", FILE_APPEND);
        file_put_contents(\Yii::getAlias('@frontend') . '/runtime/time.log', "START - ".date("Y-m-d H:i:s") . "\n");

    }

}