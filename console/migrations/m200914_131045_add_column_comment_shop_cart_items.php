<?php

use yii\db\Migration;

/**
 * Class m200914_131045_add_column_comment_shop_cart_items
 */
class m200914_131045_add_column_comment_shop_cart_items extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function up()
    {
        $this->addColumn('{{%shop_cart_items%}}','comment',$this->string()->defaultValue(''));
    }

    /**
     * {@inheritdoc}
     */
    public function down()
    {
        $this->dropColumn('{{%shop_cart_items%}}','comment');
    }

}