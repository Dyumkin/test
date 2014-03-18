<?php

class m140222_162738_add_status_activkey_to_userTable extends CDbMigration
{
	public function up()
	{
        $this->addColumn('{{user}}','activationKey','varchar(32)');
        $this->addColumn('{{user}}','status','varchar(1)');
	}

	public function down()
	{
        $this->dropColumn('{{user}}','activationKey','varchar(32)');
        $this->dropColumn('{{user}}','status','varchar(1)');
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