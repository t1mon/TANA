<?php

use yii\db\Migration;

/**
 * Class m200326_122126_shop_table_price_type_1c
 */
class m200326_122126_shop_table_price_type_1c extends Migration
{
    public function up()
    {
        $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';

        $this->createTable('{{%shop_price_type_1c}}', [
            'id' => $this->primaryKey(),
            'accounting_id' => $this->char(255),
            'name' => $this->char(255),
            'currency' => $this->char(255)
        ], $tableOptions);

    }

    public function down()
    {
        $this->dropTable('{{%shop_price_type_1c}}');
    }
}
