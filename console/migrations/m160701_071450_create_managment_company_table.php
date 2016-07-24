<?php

use yii\db\Schema;
use yii\db\Migration;

class m160701_071450_create_managment_company_table extends Migration
{
    public function up()
    {
        $this->createTable('{{%managment_company}}',[
            'id'=>$this->primaryKey(),
            'yandex' => $this->integer()->defaultValue(null),
            'title' => $this->string()->notNull(),
            'domen' => $this->string()->notNull(),
            'created_at'=>$this->integer()->notNull(),
            'updated_at'=>$this->integer()->notNull(),
        ]);
    }

    public function down()
    {
        $this->dropTable('{{%managment_company}}');
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
