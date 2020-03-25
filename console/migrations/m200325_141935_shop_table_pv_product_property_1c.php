<?php

use yii\db\Migration;

/**
 * Class m200325_141935_shop_table_pv_product_property_1c
 */
class m200325_141935_shop_table_pv_product_property_1c extends Migration
{
    public function up()
    {
        $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';

        $this->createTable('{{%shop_pv_product_property_1c}}', [
            'product_id' => $this->integer(),
            'property_id' => $this->integer(),
            'property_value_id' => $this->integer(),
            'value' => $this->char(255),
        ], $tableOptions);

    }

    public function down()
    {
        $this->dropTable('{{%shop_pv_product_property_1c}}');
    }
}
