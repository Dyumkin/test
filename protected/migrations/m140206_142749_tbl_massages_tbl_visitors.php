<?php

class m140206_142749_tbl_massages_tbl_visitors extends CDbMigration
{
	public function up()
	{
        $this->createTable('{{massage}}', array(
            'id' => 'pk',
            'user_sender_id' => 'int NOT NULL',
            'user_addressee_id' =>'int NOT NULL',
            'massage' =>'string NOT NULL',
            'date' =>'int NOT NULL',
        ));

        $this->createTable('{{visitor}}', array(
            'id' => 'pk',
            'user_id' => 'int NOT NULL',
            'stash_id' =>'int NOT NULL',
            'date' =>'int NOT NULL',
        ));

        $this->addForeignKey('massage_user_sender', '{{massage}}', 'user_sender_id', '{{user}}', 'id');
        $this->addForeignKey('massage_user_addressee', '{{massage}}', 'user_addressee_id', '{{user}}', 'id');

        $this->addForeignKey('visitor_user', '{{visitor}}', 'user_id', '{{user}}', 'id');
        $this->addForeignKey('visitor_stash', '{{visitor}}', 'stash_id', '{{stash}}', 'id');

	}

	public function down()
	{
        $this->dropForeignKey('massage_user_sender', '{{massage}}', 'user_sender_id', '{{user}}', 'id');
        $this->dropForeignKey('massage_user_addressee', '{{massage}}', 'user_addressee_id', '{{user}}', 'id');

        $this->dropForeignKey('visitor_user', '{{visitor}}', 'user_id', '{{user}}', 'id');
        $this->dropForeignKey('visitor_stash', '{{visitor}}', 'stash_id', '{{stash}}', 'id');

        $this->dropTable('{{visitor}}');
        $this->dropTable('{{massage}}');
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