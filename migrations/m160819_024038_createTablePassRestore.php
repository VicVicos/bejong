<?php

use yii\db\Migration;

class m160819_024038_createTablePassRestore extends Migration
{
    public function up()
    {
        $this->addColumn('{{%user}}', 'hash', $this->string());
    }

    public function down()
    {
        $this->dropColumn('{{%user}}', 'hash');
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
