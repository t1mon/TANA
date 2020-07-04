<?php

use yii\db\Migration;

/**
 * Class m200704_081534_change_type_column_2
 */
class m200704_081534_change_type_column_2 extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->alterColumn('shop_orders','cost',$this->float());
        $this->alterColumn('shop_order_items','price',$this->float());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->alterColumn('shop_orders','cost',$this->integer());
        $this->alterColumn('shop_order_items','price',$this->integer());
    }

}
