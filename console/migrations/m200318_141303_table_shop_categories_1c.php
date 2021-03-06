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
            'accounting_id' => $this->string()->notNull()->unique()
        ], $tableOptions);

        $this->createIndex('{{%idx-shop_categories_1c_accounting_id}}', '{{%shop_categories_1c}}', 'accounting_id', true);
        //$this->addForeignKey('{{%fk-shop_categories_1c_accounting_id}}','{{%shop_categories_1c}}','id','{{%shop_categories}}','id','CASCADE');
    }

    public function down()
    {
        $this->dropTable('{{%shop_categories_1c}}');
    }
}
