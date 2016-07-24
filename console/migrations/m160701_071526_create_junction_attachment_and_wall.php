<?php

use yii\db\Schema;
use yii\db\Migration;

class m160701_071526_create_junction_attachment_and_wall extends Migration
{
    public function up()
    {
        $this->createTable('{{%post_attachment}}',[
            '{{%attachment_id}}'=>$this->integer(),
            '{{%post_id}}'=>$this->integer(),
        ]);

        $this->createIndex('idx-post_attachment-attachment_id', 'post_attachment', 'attachment_id');
        $this->createIndex('idx-post_attachment-post_id', 'post_attachment', 'post_id');

        $this->addForeignKey('fk-post_attachment-attachment_id', 'post_attachment', 'attachment_id', 'attachment', 'id');
        $this->addForeignKey('fk-post_attachment-post_id', 'post_attachment', 'post_id', 'post', 'id');
    }

    public function down()
    {
        $this->dropTable('{{%post_attachment}}');
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
