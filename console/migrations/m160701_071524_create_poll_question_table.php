<?php

use yii\db\Schema;
use yii\db\Migration;

class m160701_071524_create_poll_question_table extends Migration
{
    public function up()
    {
         $this->createTable('{{%poll_question}}',[
             'id'=>$this->primaryKey(),
             '{{%user_id}}'=>$this->integer()->notNull(),
             '{{%managment_company_id}}'=>$this->integer()->notNull(),
             '{{%post_id}}'=>$this->integer()->notNull(),
             'question'=>$this->text()->notNull(),
             'approve'=>$this->integer()->notNull(),
             'created_at'=>$this->integer()->notNull(),
             'updated_at'=>$this->integer()->notNull(),
         ]);

        $this->createIndex('idx-poll_question-user_id','{{%poll_question}}','user_id');
        $this->createIndex('idx-poll_question-managment_company_id','{{%poll_question}}','managment_company_id');
        $this->createIndex('idx-poll_question-post_id','{{%poll_question}}','post_id');

        $this->addForeignKey('idx-poll_question-user_id','{{%poll_question}}','user_id','user','id');
        $this->addForeignKey('idx-poll_question-managment_company_id','{{%poll_question}}','managment_company_id','managment_company','id');
        $this->addForeignKey('idx-poll_question-post_id','{{%poll_question}}','post_id','post','id');
    }

    public function down()
    {
         $this->dropTable('{{%poll_question}}');
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
