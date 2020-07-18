<?php

use yii\db\Migration;

class m130524_201442_init extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%users}}', [
            'id' => $this->primaryKey(),
            'first_name' => $this->string(50)->notNull(),
            'last_name' => $this->string(50)->notNull(),
            'email' => $this->string()->notNull()->unique(),
            'password_hash' => $this->string()->notNull(),
            'password_reset_token' => $this->string()->unique(),
            'auth_key' => $this->string(32)->notNull(),
            'phone' => $this->string(12)->defaultValue(null),
            'profile_photo' => $this->string(256)->defaultValue(null),
            'gender' => $this->string(6)->defaultValue(null),
            'dob' => $this->date()->defaultValue(null),
            'city' => $this->string(50)->defaultValue(null),
            'state' => $this->string(50)->defaultValue(null),
            'country' => $this->string(50)->defaultValue(null),
            'zip' => $this->string(6)->defaultValue(null),
            'role' => $this->smallInteger()->notNull()->defaultValue(2),
            'ip_address' => $this->string(20)->defaultValue(null),
            'status' => $this->smallInteger()->notNull()->defaultValue(0),
            'created_at' => $this->dateTime()->defaultValue(null),
            'updated_at' => $this->dateTime()->defaultValue(null),
        ], $tableOptions);
    }

    public function down()
    {
        $this->dropTable('{{%users}}');
    }
}
