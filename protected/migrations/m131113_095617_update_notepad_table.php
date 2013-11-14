<?php

class m131113_095617_update_notepad_table extends CDbMigration
{
	public function up()
	{
        $this->addColumn('{{notepad}}','user_id','integer');
        $this->addColumn('{{notepad}}','stash_id','integer');
        $this->addColumn('{{notepad}}','status','integer');

        $this->addForeignKey('notepad_user', '{{notepad}}', 'user_id', '{{user}}', 'id');
        $this->addForeignKey('notepad_stash', '{{notepad}}', 'stash_id', '{{stash}}', 'id');
	}

	public function down()
	{
        $this->dropForeignKey('notepad_user', '{{notepad}}', 'user_id', '{{user}}', 'id');
        $this->dropForeignKey('notepad_stash', '{{notepad}}', 'stash_id', '{{stash}}', 'id');

        $this->dropColumn('{{notepad}}','user_id','integer');
        $this->dropColumn('{{notepad}}','stash_id','integer');
        $this->dropColumn('{{notepad}}','status','integer');
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