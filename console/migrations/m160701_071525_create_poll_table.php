<?php

use yii\db\Schema;
use yii\db\Migration;

class m160701_071525_create_poll_table extends Migration
{
    public function up()
    {
        $this->createTable('{{%poll}}',[
            'id'=>$this->primaryKey(),
            '{{%poll_question_id}}'=>$this->integer()->notNull(),
            'poll'=>$this->integer()->notNull(),
            'created_at'=>$this->integer()->notNull(),
            'updated_at'=>$this->integer()->notNull(),
        ]);

        $this->createIndex('idx-poll-poll_question_id','poll','poll_question_id');

        $this->addForeignKey('fk-poll-poll_question_id','poll','poll_question_id','poll_question','id');
    }

    public function down()
    {
        $this->dropTable('{{%poll}}');
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
