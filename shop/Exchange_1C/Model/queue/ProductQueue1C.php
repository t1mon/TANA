<?php
namespace shop\Exchange_1C\Model\queue;

use shop\Exchange_1C\Product;
use yii\base\BaseObject;

class ProductQueue1C extends BaseObject implements \yii\queue\JobInterface
{
    public $url;
    public $file;
    public $product;

    public function __construct( Product $product)
    {
        $this->product = $product;
    }

    public function execute($queue)
    {
        $this->product->save();
        //file_put_contents(\Yii::getAlias('@frontend') . '/runtime/product.log', serialize($this->product). "\n", FILE_APPEND);
    }
}