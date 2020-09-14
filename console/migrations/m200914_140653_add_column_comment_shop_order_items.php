<?php

use yii\db\Migration;

/**
 * Class m200914_140653_add_column_comment_shop_order_items
 */
class m200914_140653_add_column_comment_shop_order_items extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function up()
    {
        $this->addColumn('{{%shop_order_items%}}','comment',$this->string()->defaultValue(''));
    }

    /**
     * {@inheritdoc}
     */
    public function down()
    {
        $this->dropColumn('{{%shop_order_items%}}','comment');
    }


}
