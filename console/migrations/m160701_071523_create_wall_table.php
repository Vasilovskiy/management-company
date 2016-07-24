<?php

use yii\db\Schema;
use yii\db\Migration;

class m160701_071523_create_wall_table extends Migration
{
    public function up()
    {
        $this->createTable('{{%post}}',[
            'id'=>$this->primaryKey(),
            'house_id'=>$this->integer()->notNull(null),
            'user_id'=>$this->integer()->defaultValue(null),
            'managment_company_id'=>$this->integer()->defaultValue(null),
            'content'=>$this->text(),
            'publish_date'=>$this->integer()->notNull(),
            'created_at'=>$this->integer()->notNull(),
            'updated_at'=>$this->integer()->notNull(),
        ]);
        $this->createIndex('idx-post-house_id','post','house_id');
        $this->createIndex('idx-post-user_id','post','user_id');
        $this->createIndex('idx-post-managment_company_id', 'post','managment_company_id');

        $this->addForeignKey('fk-post-house_id', 'post', 'house_id','house','id');
        $this->addForeignKey('fk-post-user_id','post','user_id','user','id');
        $this->addForeignKey('fk-post-managment_company_id','post','managment_company_id','managment_company','id');
    }

    public function down()
    {
        $this->dropTable('{{%post}}');
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
