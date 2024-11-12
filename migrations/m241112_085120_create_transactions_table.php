<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%transactions}}`.
 */
class m241112_085120_create_transactions_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%transactions}}', [
            'id' => $this->primaryKey(),
            'date' => $this->date()->notNull(),
            'transaction_category_id' => $this->integer()->notNull(),
            'product_id' => $this->integer()->notNull(),
            'supplier_id' => $this->integer()->notNull(),
            'sales_id' => $this->integer()->notNull(),
            'quantity' => $this->integer()->notNull(),
            'berita_acara' => $this->string()->notNull(),
            'note' => $this->text(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%transactions}}');
    }
}
