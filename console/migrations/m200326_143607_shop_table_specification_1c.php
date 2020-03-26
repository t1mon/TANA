<?php

use yii\db\Migration;

/**
 * Class m200326_143607_shop_table_specification_1c
 */
class m200326_143607_shop_table_specification_1c extends Migration
{
    public function up()
    {
        $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';

        $this->createTable('{{%shop_specification_1c}}', [
            'id' => $this->primaryKey(),
            'name' => $this->char(255),
            'accounting_id' => $this->char(255)
        ], $tableOptions);

    }

    public function down()
    {
        $this->dropTable('{{%shop_specification_1c}}');
    }
}
