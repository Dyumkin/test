<?php

Yii::import('zii.widgets.CPortlet');

class AdminMenu extends CPortlet
{
	public function init()
	{
		$this->title = '<h1>'.CHtml::encode(Yii::app()->user->name).'</h1>';
        //$this->htmlOptions = array('id' => 'sidebar');
		parent::init();
	}

	protected function renderContent()
	{
		$this->render('adminMenu');
	}
}