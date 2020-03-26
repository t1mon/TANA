<?php

use yii\db\Migration;

/**
 * Class m200326_121008_shop_table_offer_1c
 */
class m200326_121008_shop_table_offer_1c extends Migration
{
    public function up()
    {
        $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';

        $this->createTable('{{%shop_offer_1c}}', [
            'id' => $this->primaryKey(),
            'name' => $this->char(255),
            'accounting_id' => $this->char(255),
            'product_id' => $this->integer(),
            'remnant' => $this->integer(),
            'is_active' => $this->boolean(),
        ], $tableOptions);

    }

    public function down()
    {
        $this->dropTable('{{%shop_offer_1c}}');
    }
}
