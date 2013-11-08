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

        $this->createTable('{{player}}', array(
            'id' => 'pk',
            'picture_id' => 'integer NOT NULL',
            'place_id' =>'integer',
            'nickname' =>'varchar(60) NOT NULL',
            'password' =>'varchar(32) NOT NULL',
            'e-mail' =>'varchar(32) NOT NULL',
            'name' =>'varchar(60)',
            'first_name' =>'varchar(60)',
            'last_name' =>'varchar(60)',
            'sex' =>'char(7)',
            'birthday' =>'date',
            'phone' =>'varchar(18)',
            'other_information' =>'longtext',
            'create_date' =>'datetime NOT NULL'
        ));

        $this->createTable('{{stash}}', array(
            'id' => 'pk',
            'player_id' => 'integer NOT NULL',
            'picture_id' => 'integer NOT NULL',
            'place_id' =>'integer',
            'stash_name' =>'varchar(60) NOT NULL',
            'type' =>'varchar(60) NOT NULL',
            'class' =>'varchar(32)',
            'attribute' =>'string',
            'season' =>'string',
            'set_date' =>'date NOT NULL',
            'coordinates' =>'point NOT NULL',
            'complexity' =>'integer',
            'stash_description' =>'longtext NOT NULL',
            'place_description' =>'longtext NOT NULL',
            'other_information' =>'longtext',
            'content' =>'text NOT NULL',
            'answer' =>'text NOT NULL',
            'question' => 'text NOT NULL',
            'status' => 'boolean NOT NULL'
        ));

        $this->createTable('{{notepad}}', array(
            'id' => 'pk',
            'player_id' => 'integer NOT NULL',
            'stash_id' =>'integer NOT NULL',
            'comment' =>'longtext NOT NULL',
            'comment_date' =>'datetime NOT NULL'
        ));

        $this->addForeignKey('player_picture', '{{player}}', 'picture_id', '{{picture}}', 'id');
        $this->addForeignKey('player_place', '{{player}}', 'place_id', '{{place}}', 'id');
        $this->addForeignKey('stash_picture', '{{stash}}', 'picture_id', '{{picture}}', 'id');
        $this->addForeignKey('stash_place', '{{stash}}', 'place_id', '{{place}}', 'id');
        $this->addForeignKey('stash_player', '{{stash}}', 'player_id', '{{player}}', 'id');
        $this->addForeignKey('notepad_player', '{{notepad}}', 'player_id', '{{player}}', 'id');
        $this->addForeignKey('notepad_stash', '{{notepad}}', 'stash_id', '{{stash}}', 'id');


	}

	public function down()
	{
        $this->dropTable('{{picture}}');
        $this->dropTable('{{place}}');
        $this->dropTable('{{player}}');
        $this->dropTable('{{stash}}');
        $this->dropTable('{{notepad}}');
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