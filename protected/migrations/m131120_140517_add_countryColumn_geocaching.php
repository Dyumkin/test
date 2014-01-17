<?php

class m131120_140517_add_countryColumn_geocaching extends CDbMigration
{
	public function up()
	{
        $this->addColumn('{{user}}','city_id','integer');
        $this->addColumn('{{stash}}','city_id','integer');

        $this->addForeignKey('user_city', '{{user}}', 'city_id', '{{city}}', 'city_id');
        $this->addForeignKey('stash_city', '{{stash}}', 'city_id', '{{city}}', 'city_id');
	}

	public function down()
	{
        $this->dropForeignKey('user_city', '{{user}}', 'city_id', '{{city}}', 'city_id');
        $this->dropForeignKey('stash_city', '{{stash}}', 'city_id', '{{city}}', 'city_id');

        $this->dropColumn('{{user}}','city_id','integer');
        $this->dropColumn('{{stash}}','city_id','integer');
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