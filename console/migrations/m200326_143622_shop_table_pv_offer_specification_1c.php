<?php

use yii\db\Migration;

/**
 * Class m200326_143622_shop_table_pv_offer_specification_1c
 */
class m200326_143622_shop_table_pv_offer_specification_1c extends Migration
{
    public function up()
    {
        $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';

        $this->createTable('{{%shop_pv_offer_specification_1c}}', [
            'offer_id' => $this->integer(),
            'specification_id' => $this->integer(),
            'value' => $this->char(255)
        ], $tableOptions);

    }

    public function down()
    {
        $this->dropTable('{{%shop_pv_offer_specification_1c}}');
    }
}
