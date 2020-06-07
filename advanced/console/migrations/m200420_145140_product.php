<?php
use yii\db\Schema;
use yii\db\Migration;

/**
 * Class m200420_145140_product
 */
class m200420_145140_product extends Migration
{
    /**
     * {@inheritdoc}
     */
    // public function safeUp()
    // {

    // }

    // /**
    //  * {@inheritdoc}
    //  */
    // public function safeDown()
    // {
    //     echo "m200420_145140_product cannot be reverted.\n";

    //     return false;
    // }

    
  // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        $tableOptions=null;
        if ($this->db->driverName==='mysql') {
            // $tableOptions='CHARACTERSET utf8 COLLATE utf8_unicode-ci ENGINE=Innodb';
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }
        $this->createTable(
            '{{%products}}',
            [
            'id'=>$this->primaryKey(),
            'name'=>$this->string()->notNull(),
            'product-handle'=>$this->string()->unique(),
            'images'=>$this->text(),
            'price'=>$this->integer(),
            'inventory'=>$this->integer(),
            'created_at'=>$this->datetime(),
            'updated_at'=>$this->timestamp(),
            'status'=>$this->boolean(),
            ],
            $tableOptions
        );

        //========secoand table=====================================
        $this->createTable(
            '{{%product_variants}}',
            [
            'p_id'=>$this->primaryKey(),
            'name'=>$this->string(),
            'product_id'=>$this->Integer(),
            'price'=>$this->integer(),
            'inventory'=>$this->integer(),
            'created_at'=>$this->datetime(),
            'updated_at'=>$this->timestamp(),
            'status'=>$this->boolean(),
            ],
            $tableOptions
        );
        $this->addForeignKey('product_variants_ibfk_1', 'product_variants', 'product_id', 'products', 'id', 'CASCADE', 'CASCADE');
    }

    public function down()
    {
        $this->dropForeignKey('product_id', 'product_variants');
        $this->dropTable('{{%products}}');
        $this->dropTable('{{%product_variants}}');
    }
}
