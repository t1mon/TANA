<?php

use yii\db\Migration;

/**
 * Class m200324_111744_shop_table_requisite_1c
 */
class m200324_111744_shop_table_requisite_1c extends Migration
{
    public function up()
    {
        $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';

        $this->createTable('{{%shop_requisite_1c}}', [
            'id' => $this->primaryKey(),
            'name' => $this->char(255)
        ], $tableOptions);

    }

    public function down()
    {
        $this->dropTable('{{%shop_requisite_1c}}');
    }
}
