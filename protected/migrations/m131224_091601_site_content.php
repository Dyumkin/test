<?php

class m131224_091601_site_content extends CDbMigration
{
	public function up()
	{
        $this->createTable('{{site_content}}', array(
            'id' => 'pk',
            'name' => 'string NOT NULL',
            'content' =>'longtext NOT NULL'
        ));
	}

	public function down()
	{
        $this->dropTable('{{site_content}}');
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