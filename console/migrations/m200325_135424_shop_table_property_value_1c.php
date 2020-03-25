<?php

use yii\db\Migration;

/**
 * Class m200325_135424_shop_table_property_value_1c
 */
class m200325_135424_shop_table_property_value_1c extends Migration
{
    public function up()
    {
        $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';

        $this->createTable('{{%shop_property_value_1c}}', [
            'id' => $this->primaryKey(),
            'property_id' => $this->integer(),
            'name' => $this->char(255),
            'accounting_id' => $this->char(255)
        ], $tableOptions);

    }

    public function down()
    {
        $this->dropTable('{{%shop_property_value_1c}}');
    }
}
