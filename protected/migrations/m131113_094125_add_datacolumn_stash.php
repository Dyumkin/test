<?php

class m131113_094125_add_datacolumn_stash extends CDbMigration
{
	public function up()
	{
        $this->addColumn('{{stash}}','create_date','date');
        $this->addColumn('{{stash}}','update_date','date');
	}

	public function down()
	{
        $this->dropColumn('{{stash}}','create_date','date');
        $this->dropColumn('{{stash}}','update_date','date');
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