<?php

use yii\db\Schema;
use yii\db\Migration;

class m160701_100548_create_vote_table extends Migration
{
    public function up()
    {
        $this->createTable('{{%vote}}',[
            'id'=>$this->primaryKey(),
            '{{%user_id}}'=>$this->integer()->notNull(),
            '{{%poll_question_id}}'=>$this->integer()->notNull(),
            '{{%poll_id}}'=>$this->integer()->notNull(),
            'created_at'=>$this->integer()->notNull(),
            'updated_at'=>$this->integer()->notNull(),
        ]);

        $this->createIndex('idx-vote-user_id','{{%vote}}','user_id');
        $this->createIndex('idx-vote-poll_question_id','{{%vote}}','poll_question_id');
        $this->createIndex('idx-vote-poll_id','{{%vote}}','poll_id');

        $this->addForeignKey('fk-vote-user_id','{{%vote}}','user_id','user','id');
        $this->addForeignKey('fk-vote-poll_question_id','{{%vote}}','poll_question_id','poll_question','id');
        $this->addForeignKey('fk-vote-poll_id','{{%vote}}','poll_id','poll','id');
    }

    public function down()
    {
        $this->dropTable('{{%vote}}');
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
