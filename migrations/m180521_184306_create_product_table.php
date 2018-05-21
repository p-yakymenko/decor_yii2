<?php

use yii\db\Migration;

/**
 * Handles the creation of table `product`.
 * Has foreign keys to the tables:
 *
 * - `category`
 */
class m180521_184306_create_product_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('product', [
            'id' => $this->primaryKey(),
            'category_id' => $this->integer()->notNull(),
            'name' => $this->string()->notNull(),
            'content' => $this->text(),
            'price' => $this->float()->defaultValue(0),
            'keywords' => $this->string(),
            'description' => $this->string(),
            'img' => $this->string()->defaultValue('no-image.png'),
            'hit' => "enum('0','1') NOT NULL DEFAULT '0'",
            'new' => "enum('0','1') NOT NULL DEFAULT '0'",
            'sale' => "enum('0','1') NOT NULL DEFAULT '0'",

        ]);

        // creates index for column `category_id`
        $this->createIndex(
            'idx-product-category_id',
            'product',
            'category_id'
        );

        // add foreign key for table `category`
        $this->addForeignKey(
            'fk-product-category_id',
            'product',
            'category_id',
            'category',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `category`
        $this->dropForeignKey(
            'fk-product-category_id',
            'product'
        );

        // drops index for column `category_id`
        $this->dropIndex(
            'idx-product-category_id',
            'product'
        );

        $this->dropTable('product');
    }
}
