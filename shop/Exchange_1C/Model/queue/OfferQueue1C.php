<?php
namespace shop\Exchange_1C\Model\queue;

use shop\Exchange_1C\Offer;

use yii\base\BaseObject;

class OfferQueue1C extends BaseObject implements \yii\queue\JobInterface
{
    public $url;
    public $file;
    public $offer;

    public function __construct( Offer $offer)
    {
        $this->offer = $offer;
    }

    public function execute($queue)
    {
        //if ($this->offer->getDirtyAttributes()) {
            $this->offer->save();
            //file_put_contents(\Yii::getAlias('@frontend') . '/runtime/offer.log', $this->offer->name . "\n", FILE_APPEND);
        //}
    }
}