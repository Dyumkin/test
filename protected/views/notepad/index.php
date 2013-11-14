<?php
/* @var $this NotepadController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Notepads',
);
?>

<h1>Notepads</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
