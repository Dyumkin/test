<?php

class m140130_103147_add_profile extends CDbMigration
{
	public function up()
	{
        $this->createTable('{{profile}}', array(
            'id' => 'pk',
            'user_id' => 'int NOT NULL',
            'massage' =>'text',
            'stash_id' =>'int',
            'date' => 'int',
            'find_stash' => 'int'
        ));

        $this->addForeignKey('profile_user', '{{profile}}', 'user_id', '{{user}}', 'id');
        $this->addForeignKey('profile_stash', '{{profile}}', 'stash_id', '{{stash}}', 'id');
        $this->addForeignKey('profile_fstash', '{{profile}}', 'find_stash', '{{stash}}', 'id');
	}

	public function down()
	{
        $this->dropForeignKey('profile_stash', '{{profile}}', 'stash_id', '{{stash}}', 'id');
        $this->dropForeignKey('profile_fstash', '{{profile}}', 'find_stash', '{{stash}}', 'id');
        $this->dropForeignKey('profile_user', '{{profile}}', 'user_id', '{{user}}', 'id');
        $this->dropTable('{{profile}}');
	}

	/*
	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
	}

	public function safeDown()
	{
	}
	*/
}