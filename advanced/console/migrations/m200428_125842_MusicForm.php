<?php

use yii\db\Migration;

/**
 * Class m200428_125842_MusicForm
 */
class m200428_125842_MusicForm extends Migration
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

        $this->createTable('{{%MusicForm}}', [
            'name' => $this->string(50)->notNull(),
            'instrument' => $this->string(50)->notNull(),
            'mobile' => $this->integer(),
             ], $tableOptions);

        $this->addPrimaryKey('mobile', 'MusicForm', 'mobile');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%MusicForm}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200428_125842_MusicForm cannot be reverted.\n";

        return false;
    }
    */
}
