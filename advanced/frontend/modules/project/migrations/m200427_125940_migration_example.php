<?php

use yii\db\Migration;

/**
 * Class m200427_125940_migration_example
 */
class m200427_125940_migration_example extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200427_125940_migration_example cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200427_125940_migration_example cannot be reverted.\n";

        return false;
    }
    */
}
