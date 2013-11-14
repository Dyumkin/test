<?php

class m131114_082529_drop_colimn_coordinats extends CDbMigration
{
	public function up()
	{
        $this->dropColumn('{{stash}}','coordinates','point');
	}

	public function down()
	{
        $this->addColumn('{{stash}}','coordinates','point');
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