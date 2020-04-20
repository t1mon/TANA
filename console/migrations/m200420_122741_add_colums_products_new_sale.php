<?php

use yii\db\Migration;

/**
 * Class m200420_122741_add_colums_products_new_sale
 */
class m200420_122741_add_colums_products_new_sale extends Migration
{
    public function safeUp()
    {
        $this->addColumn('{{%shop_products}}', 'new', $this->smallInteger()->defaultValue(0));
        $this->addColumn('{{%shop_products}}', 'sale', $this->smallInteger()->defaultValue(0));
        $this->update('{{%shop_products}}', ['new' => 0, 'sale' => 0]);
    }

    public function safeDown()
    {
        $this->dropColumn('{{%shop_products}}', 'new');
        $this->dropColumn('{{%shop_products}}', 'sale');
    }

}
