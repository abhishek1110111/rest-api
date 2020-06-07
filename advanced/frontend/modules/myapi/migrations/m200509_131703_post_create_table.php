<?php

use yii\db\Migration;

/**
 * Class m200509_131703_post_create_table
 */
class m200509_131703_post_create_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%post}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string(512),
            'body' => 'LONGTEXT',
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
            'created_by' => $this->integer()
        ]);

        $this->addForeignKey('FK_post_user_created_by', '{{%post}}', 'created_by', '{{%user}}', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
         $this->dropForeignKey('FK_post_user_created_by', '{{%post}}');
        $this->dropTable('{{%post}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200509_131703_post_create_table cannot be reverted.\n";

        return false;
    }
    */
}
