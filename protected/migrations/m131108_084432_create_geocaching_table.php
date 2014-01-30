<?php

class m131108_084432_create_geocaching_table extends CDbMigration
{
	public function up()
	{
        $this->createTable('{{picture}}', array(
            'id' => 'pk',
            'small_image' => 'string NOT NULL',
            'big_image' =>'string NOT NULL'
        ));

        $this->createTable('{{place}}', array(
            'id' => 'pk',
            'country' => 'string NOT NULL',
            'region' =>'string NOT NULL',
            'town' =>'string NOT NULL'
        ));

        $this->createTable('{{user}}', array(
            'id' => 'pk',
            'username' =>'varchar(60) NOT NULL UNIQUE KEY',
            'password' =>'varchar(32) NOT NULL',
            'e_mail' =>'varchar(32) NOT NULL UNIQUE KEY',
            'name' =>'varchar(60)',
            'first_name' =>'varchar(60)',
            'last_name' =>'varchar(60)',
            'sex' =>'char(7)',
            'birthday' =>'date',
            'phone' =>'varchar(18)',
            'other_information' =>'longtext',
            'create_date' =>'datetime NOT NULL',


        ));

        $this->createTable('{{stash}}', array(
            'id' => 'pk',
            'stash_name' =>'varchar(60) NOT NULL',
            'type' =>'varchar(60) NOT NULL',
            'class' =>'varchar(32)',
            'attribute' =>'string',
            'season' =>'string',
            'coordinates' =>'point NOT NULL',
            'complexity' =>'integer',
            'stash_description' =>'longtext NOT NULL',
            'place_description' =>'longtext NOT NULL',
            'other_information' =>'longtext',
            'content' =>'text NOT NULL',
            'answer' =>'text NOT NULL',
            'question' => 'text NOT NULL',
            'status' => 'varchar(10) NOT NULL'
        ));

        $this->createTable('{{notepad}}', array(
            'id' => 'pk',
            'comment' =>'longtext NOT NULL',
            'comment_date' =>'datetime NOT NULL'
        ));



	}

	public function down()
	{
        $this->dropTable('{{notepad}}');
        $this->dropTable('{{stash}}');
        $this->dropTable('{{user}}');
        $this->dropTable('{{picture}}');
        $this->dropTable('{{place}}');
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