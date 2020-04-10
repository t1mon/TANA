<?php

use yii\db\Migration;

/**
 * Class m200324_110206_shop_table_product_1c
 */
class m200324_110206_shop_table_product_1c extends Migration
{
    public function up()
    {
        $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';

        $this->createTable('{{%shop_product_1c}}', [
            'id' => $this->primaryKey(),
            'name' => $this->char(255),
            'article' => $this->char(255),
            'description' => $this->char(255),
            'accounting_id' => $this->char(255),
            'price' => $this->integer(),
            'group_id' => $this->integer(),
            'catalog_id' => $this->integer(),
            'is_active' => $this->boolean(),
            'remnant' => $this->integer()->defaultValue(null),
            'created_at' => $this->timestamp(),
            'updated_at' => $this->integer()->defaultValue(null)
        ], $tableOptions);

    }

    public function down()
    {
        $this->dropTable('{{%shop_product_1c}}');
    }
}
