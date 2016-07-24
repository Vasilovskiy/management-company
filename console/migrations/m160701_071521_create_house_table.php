<?php

use yii\db\Schema;
use yii\db\Migration;

class m160701_071521_create_house_table extends Migration
{
    public function up()
    {
        $this->createTable('{{%house}}', [
            'id'=>$this->primaryKey(),
            'user_id' => $this->integer()->defaultValue(null),//временное решение
            'attachment_id'=>$this->integer()->defaultValue(null),
            'managment_company_id'=>$this->integer()->defaultValue(null),
            'fias_house_id'=>$this->integer()->defaultValue(null),//временное решение
            'floors'=>$this->integer()->notNull(),
            'apartaments'=>$this->integer()->notNull(),
            'year_of_build'=>$this->integer()->notNull(),
            'year_of_commissioning'=>$this->integer()->notNull(),
            'state'=>$this->string(),
            'series'=>$this->string(),
            'type'=>$this->string(),
            'created_at'=>$this->integer()->notNull(),
            'updated_at'=>$this->integer()->notNull(),
        ]);

        $this->createIndex('idx-house-managment_company_id','house','managment_company_id');

        $this->addForeignKey('fk-house-managment_company_id','house','managment_company_id','managment_company','id');
    }

    public function down()
    {
        $this->dropTable('{{%house}}');
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
