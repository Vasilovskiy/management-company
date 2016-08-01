<?php

use yii\db\Schema;
use yii\db\Migration;

class m160701_071522_create_apartment_table extends Migration
{
    public function up()
    {
        $this->createTable('{{%apartment}}',[
            'id'=>$this->primaryKey(),
            '{{%user_id}}'=>$this->integer()->notNull(),
            '{{%house_id}}'=>$this->integer()->notNull(),
            '{{%apartment_type_id}}'=>$this->integer()->notNull(),
            'area'=>$this->integer()->notNull(),
            'number_of_roomes'=>$this->integer()->notNull(),
            'created_at'=>$this->integer()->notNull(),
            'updated_at'=>$this->integer()->notNull(),
        ]);

        $this->createIndex('idx-apartment-user_id','{{%apartment}}','user_id');
        $this->createIndex('idx-apartment-house_id','{{%apartment}}','house_id');
        $this->createIndex('idx-apartment-apartment_type_id','{{%apartment}}','apartment_type_id');

        $this->addForeignKey('fk-apartment-user_id','{{%apartment}}','user_id','user','id');
        $this->addForeignKey('fk-apartment-house_id','{{%apartment}}','house_id','house','id');
        $this->addForeignKey('fk-apartment-apartment_type_id','{{%apartment}}','apartment_type_id','apartment_type','id');
    }

    public function down()
    {
        $this->dropTable('{{%apartment}}');
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
