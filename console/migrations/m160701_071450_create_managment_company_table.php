<?php

use yii\db\Schema;
use yii\db\Migration;
use common\models\ManagmentCompany;

class m160701_071450_create_managment_company_table extends Migration
{
    public function up()
    {
        $this->createTable('{{%managment_company}}',[
            'id'=>$this->primaryKey(),
            'title' => $this->string()->notNull(),
            'address_id'=>$this->integer()->defaultValue(null),
            'domen' => $this->string()->notNull()->unique(),
            'number' => $this->string()->notNull(),
            'legal_name' => $this->string()->notNull(),
            'legal_address' => $this->string()->notNull(),
            'inn' => $this->string()->notNull(),
            'kpp' => $this->string()->notNull(),
            'ogrn' => $this->string()->notNull(),
            'ras_schet' => $this->string()->notNull(),
            'korr_schet' => $this->string()->notNull(),
            'bik' => $this->string()->notNull(),
            'inn_bank' => $this->string()->notNull(),
            'kpp_bank' => $this->string()->notNull(),
            'ogrn_bank' => $this->string()->notNull(),

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
