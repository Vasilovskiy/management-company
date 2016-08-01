<?php

use yii\db\Migration;

class m160726_032742_create_address_tables extends Migration
{
    public function up()
    {
        $this->createTable('{{%map_address}}', [
            'id' => $this->primaryKey(),
            'country_id' => $this->integer()->notNull(),
            'city_id' => $this->integer()->notNull(),
            'street_id' => $this->integer()->notNull(),
            'house_id' => $this->integer()->notNull(),
            'point' => 'POINT',
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ]);

        $this->createTable('{{%map_country}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
        ]);

        $this->createTable('{{%map_city}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'slug' => $this->string()->notNull()
        ]);

        $this->createTable('{{%map_street}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull()
        ]);

        $this->createTable('{{%map_house}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull()
        ]);

        $this->createIndex('idx-map_address-country_id', '{{%map_address}}', 'country_id');
        $this->createIndex('idx-map_address-city_id', '{{%map_address}}', 'city_id');
        $this->createIndex('idx-map_address-street_id', '{{%map_address}}', 'street_id');
        $this->createIndex('idx-map_address-house_id', '{{%map_address}}', 'house_id');

        $this->addForeignKey('fk-map_address-country_id', '{{%map_address}}', 'country_id', '{{%map_country}}', 'id');
        $this->addForeignKey('fk-map_address-city_id', '{{%map_address}}', 'city_id', '{{%map_city}}', 'id');
        $this->addForeignKey('fk-map_address-street_id', '{{%map_address}}', 'street_id', '{{%map_street}}', 'id');
        $this->addForeignKey('fk-map_address-house_id', '{{%map_address}}', 'house_id', '{{%map_house}}', 'id');

        $this->addForeignKey('fk-house-address_id','{{%house}}','address_id','{{%map_address}}','id');
    }

    public function down()
    {
        $this->dropForeignKey('fk-house-address_id','{{%house}}');
        $this->dropTable('{{%map_address}}');
        $this->dropTable('{{%map_country}}');
        $this->dropTable('{{%map_city}}');
        $this->dropTable('{{%map_street}}');
        $this->dropTable('{{%map_house}}');
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
