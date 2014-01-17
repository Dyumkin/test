<?php

class m131119_132926_create_contry_region_sity_table extends CDbMigration
{
	public function up()
	{
        $this->createTable('{{country}}', array(
            'country_id' => 'pk',
            'city_id' => 'int NOT NULL default "0"',
            'name' => 'varchar(128) NOT NULL default ""',
        ));

        $this->createTable('{{region}}', array(
            'region_id' => 'pk',
            'country_id' => 'int NOT NULL default "0"',
            'city_id' => 'int NOT NULL default "0"',
            'name' => 'varchar(128) NOT NULL default ""',
        ));

        $this->createTable('{{city}}', array(
            'city_id' => 'pk',
            'country_id' => 'int NOT NULL default "0"',
            'region_id' => 'int NOT NULL default "0"',
            'name' => 'varchar(128) NOT NULL default ""',
        ));

	}


	public function down()
	{
        $this->dropTable('{{country}}');
        $this->dropTable('{{region}}');
        $this->dropTable('{{city}}');
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