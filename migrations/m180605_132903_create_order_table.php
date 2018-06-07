<?php

use yii\db\Migration;

/**
 * Handles the creation of table `order`.
 */
class m180605_132903_create_order_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('order', [
            'id' => $this->primaryKey(),
            'created_at' => $this->dateTime()->notNull(),
            'updated_at' => $this->dateTime()->notNull(),
            'qty' => $this->integer()->notNull(),
            'sum' => $this->float()->notNull(),
            'status' => "enum('0','1') NOT NULL DEFAULT '0'",
            'first_name' => $this->string()->notNull(),
            'last_name' => $this->string()->notNull(),
            'email' => $this->string()->notNull(),
            'address' => $this->string()->notNull(),
            'city' => $this->string()->notNull(),
            'country' => $this->string()->notNull(),
            'post_index' => $this->string()->notNull(),
            'phone' => $this->string()->notNull(),
            
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('order');
    }
}
