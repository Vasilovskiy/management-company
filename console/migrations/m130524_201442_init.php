<?php

use yii\db\Migration;
use common\models\User;

class m130524_201442_init extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%user}}', [
            'id' => $this->primaryKey(),
            'username' => $this->string()->notNull()->unique(),
            'auth_key' => $this->string(32)->notNull(),
            'password_hash' => $this->string()->notNull()->unique(),
            'password_reset_token' => $this->string()->unique(),
            'first_name'=>$this->string()->defaultValue(null),
            'middle_name'=>$this->string()->defaultValue(null),
            'last_name'=>$this->string()->defaultValue(null),
            'email'=>$this->string()->defaultValue(null),
            'date_of_birth'=>$this->integer()->defaultValue(null),
            'status' => $this->smallInteger()->notNull()->defaultValue(10),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ], $tableOptions);

        $user = new User();
        $user->username = 'admin';
        $user->setPassword('232323');
        $user->generateAuthKey();
        $user->save(false);
    }

    public function down()
    {
        $this->dropTable('{{%user}}');
    }
}
