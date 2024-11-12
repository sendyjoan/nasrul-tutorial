<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%sales}}`.
 */
class m241110_145051_create_sales_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%saleses}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'phone_number' => $this->string()->notNull(),
            'email' => $this->string()->notNull(),
            'address' => $this->text(),
            'supplier_id' => $this->integer()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%saleses}}');
    }
}
