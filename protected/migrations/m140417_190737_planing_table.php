<?php

class m140417_190737_planing_table extends CDbMigration
{
	public function up()
	{
        $this->createTable('{{planing}}', array(
            'id' => 'pk',
            'user_id' => 'int NOT NULL',
            'stash_id' =>'int NOT NULL',
            'date' => 'int NOT NULL'
        ));

        $this->addForeignKey('planing_user', '{{planing}}', 'user_id', '{{user}}', 'id');
        $this->addForeignKey('planing_stash', '{{planing}}', 'stash_id', '{{stash}}', 'id');
	}

	public function down()
	{
        $this->dropForeignKey('planing_user', '{{planing}}', 'user_id', '{{user}}', 'id');
        $this->dropForeignKey('planing_stash', '{{planing}}', 'stash_id', '{{stash}}', 'id');

        $this->dropTable('{{planing}}');
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