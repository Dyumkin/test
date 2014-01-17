<?php

class m131119_135928_foreign_key_country_region_sity_table extends CDbMigration
{
	public function up()
	{
        //$this->addForeignKey('country_city', '{{country}}', 'city_id', '{{city}}', 'city_id');
        $this->addForeignKey('region_country', '{{region}}', 'country_id', '{{country}}', 'country_id');
        //$this->addForeignKey('region_city', '{{region}}', 'city_id', '{{city}}', 'city_id');
        $this->addForeignKey('city_region', '{{city}}', 'region_id', '{{region}}', 'region_id');
        $this->addForeignKey('city_country', '{{city}}', 'country_id', '{{country}}', 'country_id');

        $sql = file_get_contents('data/country.sql');
        $this->execute($sql);

        $sql_1 = file_get_contents('data/region.sql');
        $this->execute($sql_1);

        $sql_2 = file_get_contents('data/city.sql');
        $this->execute($sql_2);
	}

	public function down()
	{
        $this->dropForeignKey('city_country', '{{city}}', 'country_id', '{{country}}', 'country_id');
        $this->dropForeignKey('city_region', '{{city}}', 'region_id', '{{region}}', 'region_id');
        //$this->dropForeignKey('region_city', '{{region}}', 'city_id', '{{city}}', 'city_id');
        $this->dropForeignKey('region_country', '{{region}}', 'country_id', '{{country}}', 'country_id');
        //$this->dropForeignKey('country_city', '{{country}}', 'city_id', '{{city}}', 'city_id');

        $this->truncateTable('{{city}}');
        $this->truncateTable('{{region}}');
        $this->truncateTable('{{country}}');
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