<?php

use yii\db\Migration;

/**
 * Class m200428_094931_hospital
 */
class m200428_094931_hospital extends Migration
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

        $this->createTable('{{%hospital}}', [
            // 'customer_id' => $this->integer(),
            'patient_name' => $this->string(50)->notNull(),
            'email' => $this->string(50)->notNull(),
            'password' => $this->string(50)->unique(),
            'dieases_name' => $this->string(50)->notNull(),
            'status' => $this->boolean()->notNull(),
            'auth_key' => $this->string(),
            'password_hash'=>$this->string(),
            
        ], $tableOptions);
        $this->addPrimaryKey('email', 'hospital', 'email');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%hospital}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200428_094931_hospital cannot be reverted.\n";

        return false;
    }
    */
}
