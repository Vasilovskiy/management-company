<?php

use yii\db\Schema;
use yii\db\Migration;

class m160701_071451_create_junction_managment_company_and_user extends Migration
{
    public function up()
    {
          $this->createTable('{{%managment_company_user}}',[
              'managment_company_id'=>$this->integer()->notNull(),
              'user_id'=>$this->integer()->notNull()
          ]);

        $this->createIndex('idx-managment_company_user-managment_company_id', 'managment_company_user', 'managment_company_id');
        $this->createIndex('idx-managment_company_user-user_id', 'managment_company_user', 'user_id');

        $this->addForeignKey('fk-managment_company_user-managment_company_id', 'managment_company_user', 'managment_company_id', 'managment_company', 'id');
        $this->addForeignKey('fk-managment_company_user-user_id', 'managment_company_user', 'user_id', 'user', 'id');
    }

    public function down()
    {
        $this->dropTable('managment_company_user');
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
