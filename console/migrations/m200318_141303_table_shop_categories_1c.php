<?php

use yii\db\Migration;

/**
 * Class m200318_141303_table_shop_categories_1c
 */
class m200318_141303_table_shop_categories_1c extends Migration
{
    public function up()
    {
        $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';

        $this->createTable('{{%shop_categories_1c}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'parent_id' => $this->integer(),
            'accounting_id' => $this->string()
        ], $tableOptions);


    }

    public function down()
    {
        $this->dropTable('{{%shop_categories_1c}}');
    }
}
