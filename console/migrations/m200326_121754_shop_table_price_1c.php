<?php

use yii\db\Migration;

/**
 * Class m200326_121754_shop_table_price_1c
 */
class m200326_121754_shop_table_price_1c extends Migration
{
    public function up()
    {
        $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';

        $this->createTable('{{%shop_price_1c}}', [
            'id' => $this->primaryKey(),
            'performance' => $this->char(255),
            'value' => $this->integer(),
            'currency' => $this->char(255),
            'rate' => $this->double(),
            'type_id' => $this->integer(),
        ], $tableOptions);

    }

    public function down()
    {
        $this->dropTable('{{%shop_price_1c}}');
    }
}
