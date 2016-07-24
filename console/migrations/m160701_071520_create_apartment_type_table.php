<?php

use yii\db\Schema;
use yii\db\Migration;

class m160701_071520_create_apartment_type_table extends Migration
{
    public function up()
    {
        $this->createTable('{{%apartment_type}}',[
            'id'=>$this->primaryKey(),
            'name'=>$this->string()->notNull(),
            'created_at'=>$this->integer()->notNull(),
            'updated_at'=>$this->integer()->notNull(),
        ]);
    }

    public function down()
    {
       $this->dropTable('{{%apartment_type}}');
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
