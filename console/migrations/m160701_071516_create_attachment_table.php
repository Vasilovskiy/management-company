<?php

use yii\db\Schema;
use yii\db\Migration;

class m160701_071516_create_attachment_table extends Migration
{
    public function up()
    {
        $this->createTable('{{%attachment}}', [
            'id'=>$this->primaryKey(),
            'filename'=>$this->string()->notNull(),
            'extenssion'=>$this->string()->notNull(),
            'mime_type'=>$this->string()->notNull(),
            'size'=>$this->string()->notNull(),
            'duration'=>$this->integer()->notNull(),
            'created_at'=>$this->integer()->notNull(),
            'update_at'=>$this->integer()->notNull(),
        ]);
    }

    public function down()
    {
        $this->dropTable('{{%attachment}}');
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
