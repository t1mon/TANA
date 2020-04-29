<?php

use yii\db\Migration;

/**
 * Class m200429_101950_update_shop_product_1c_updated_at
 */
class m200429_101950_update_shop_product_1c_updated_at extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
            $this->update('{{%shop_product_1c}}', ['updated_at' => 1]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->update('{{%shop_product_1c}}', ['updated_at' => 0]);
    }

}
