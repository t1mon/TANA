<?php

use yii\db\Migration;

/**
 * Class m200430_083435_add_column_brands_accounting_id
 */
class m200430_083435_add_column_brands_accounting_id extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%shop_brands}}', 'accounting_id', $this->char(255)->defaultValue(null));
        $this->update('{{%shop_brands}}', ['accounting_id' => null]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%shop_brands}}', 'accounting_id');
    }


}
