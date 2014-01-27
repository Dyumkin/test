<?php

class m140121_092214_add_gallery extends CDbMigration
{
    public function up() {
        $this->createTable( '{{gallery}}', array(
            'id' => 'pk',
            'versions_data' => 'text NOT NULL',
            'name' => 'boolean NOT NULL DEFAULT 1',
            'description' => 'boolean NOT NULL DEFAULT 1'
        ) );

        $this->createTable( '{{gallery_photo}}', array(
            'id' => 'pk',
            'gallery_id' => 'integer NOT NULL',
            'rank' => 'integer NOT NULL DEFAULT 0',
            'name' => 'string NOT NULL',
            'description' => 'text',
            'file_name' => 'string NOT NULL'
        ) );

        $this->addForeignKey( 'fk_gallery_photo_gallery1', '{{gallery_photo}}', 'gallery_id',
            '{{gallery}}', 'id', 'NO ACTION', 'NO ACTION' );

        $this->addColumn('{{stash}}','gallery_id','integer');
    }

    public function down() {
        $this->dropTable( '{{gallery_photo}}' );
        $this->dropTable( '{{gallery}}' );

        $this->dropColumn('{{stash}}','gallery_id','integer');
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