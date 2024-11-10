<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%products}}`.
 */
class m241110_151802_create_products_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%products}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'description' => $this->text(),
            'price' => $this->decimal(10, 2)->notNull(),
            'stock' => $this->integer()->notNull(),
            'category_id' => $this->integer(),
            'FOREIGN KEY (category_id) REFERENCES categories(id)'
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%products}}');
    }
}
