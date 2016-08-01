<?php

use yii\db\Schema;
use yii\db\Migration;

class m160714_101121_create_table_advertisment extends Migration
{
    public function up()
    {
        $this->createTable('{{%advertisment}}', [
            'id' =>$this->primaryKey(),
            'post_id'=>$this->integer()->defaultValue(null),
            'user_id'=>$this->integer()->notNull(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ]);

        $this->createIndex('idx-advertisment-post_id', '{{%advertisment}}', 'post_id');
        $this->createIndex('idx-advertisment-user_id', '{{%advertisment}}', 'user_id');

        $this->addForeignKey('fk-advertisment-post_id', '{{%advertisment}}', 'post_id', 'post', 'id');
        $this->addForeignKey('fk-advertisment-user_id', '{{%advertisment}}', 'user_id', 'user', 'id');
    }

    public function down()
    {
        $this->dropTable('{{%advertisment}}');
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
