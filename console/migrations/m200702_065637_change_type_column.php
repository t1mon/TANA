<?php

use yii\db\Migration;

/**
 * Class m200702_065637_change_type_column
 */
class m200702_065637_change_type_column extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->alterColumn('shop_price_1c','value',$this->float());
        $this->alterColumn('shop_product_1c','price',$this->float());
        $this->alterColumn('shop_products','price_old',$this->float());
        $this->alterColumn('shop_products','price_new',$this->float());
        $this->alterColumn('shop_modifications','price',$this->float());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->alterColumn('shop_price_1c','value',$this->integer());
        $this->alterColumn('shop_product_1c','price',$this->integer());
        $this->alterColumn('shop_products','price_old',$this->integer());
        $this->alterColumn('shop_products','price_new',$this->integer());
        $this->alterColumn('shop_modifications','price',$this->integer());
    }

}
