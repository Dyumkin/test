<?php

class m131218_084133_add_point_to_stash extends CDbMigration
{
	public function up()
	{
        $this->addColumn('{{stash}}','latitude','double');
        $this->addColumn('{{stash}}','longitude','double');
	}

	public function down()
	{
        $this->dropColumn('{{stash}}','latitude','double');
        $this->dropColumn('{{stash}}','longitude','double');
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