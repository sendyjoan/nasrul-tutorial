<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%transaction_categories}}`.
 */
class m241112_083050_create_transaction_categories_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%transaction_categories}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%transaction_categories}}');
    }
}
