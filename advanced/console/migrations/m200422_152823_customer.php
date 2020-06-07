<?php

use yii\db\Migration;

/**
 * Class m200422_152823_customer
 */
class m200422_152823_customer extends Migration
{
     /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%customer}}', [
            'customer_id' => $this->integer(),
            'email' => $this->string(50)->notNull(),
            'password' => $this->string(50)->unique(),
            'customername' => $this->string(50)->notNull(),
            'customerplan' => $this->string(50)->notNull(),
            'customer_in_date' => $this->dateTime()->notNull(),
            'customer_out_date' => $this->dateTime()->notNull(),
            'status' => $this->boolean()->notNull(),
            'auth_key' => $this->string(),
            'password_hash'=>$this->string(),
            
        ], $tableOptions);

        $this->addPrimaryKey('email', 'customer', 'email');
        // $this->createIndex(
        //     'idx-unique-customer-email',
        //     'customer',
        //     'email'
        // );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // $this->dropIndex(
        //     'idx-unique-customer-email',
        //     'customer'
        // );
        $this->dropTable('{{%customer}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200421_152126_customer cannot be reverted.\n";

        return false;
    }
    */
}