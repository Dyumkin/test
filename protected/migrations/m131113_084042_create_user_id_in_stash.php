<?php

class m131113_084042_create_user_id_in_stash extends CDbMigration
{
	public function up()
	{
        $this->addColumn('{{stash}}','user_id','integer');

        $this->addForeignKey('stash_user', '{{stash}}', 'user_id', '{{user}}', 'id');
	}

	public function down()
	{

        $this->dropForeignKey('stash_user', '{{stash}}', 'user_id', '{{user}}', 'id');

        $this->dropColumn('{{stash}}','user_id','integer');
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