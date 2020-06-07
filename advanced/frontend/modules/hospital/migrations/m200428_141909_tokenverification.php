<?php

use yii\db\Migration;

/**
 * Class m200428_141909_tokenverification
 */
class m200428_141909_tokenverification extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

        $this->addColumn('{{%hospital}}', 'verification_token', $this->string()->defaultValue(null));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%user}}', 'verification_token');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200428_141909_tokenverification cannot be reverted.\n";

        return false;
    }
    */
}
