<?php

class m131113_094125_add_datacolumn_stash extends CDbMigration
{
	public function up()
	{
        $this->addColumn('{{stash}}','create_date','int');
        $this->addColumn('{{stash}}','update_date','int');
	}

	public function down()
	{
        $this->dropColumn('{{stash}}','create_date','int');
        $this->dropColumn('{{stash}}','update_date','int');
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