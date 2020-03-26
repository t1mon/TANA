<?php

use yii\db\Migration;

/**
 * Class m200326_122350_shop_table_pv_offer_prices_1c
 */
class m200326_122350_shop_table_pv_offer_prices_1c extends Migration
{
    public function up()
    {
        $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';

        $this->createTable('{{%shop_pv_offer_prices_1c}}', [
            'offer_id' => $this->integer(),
            'price_id' => $this->integer(),
        ], $tableOptions);

    }

    public function down()
    {
        $this->dropTable('{{%shop_pv_offer_prices_1c}}');
    }
}
