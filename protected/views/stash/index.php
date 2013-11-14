<?php
/* @var $this StashController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Stashes',
);

?>

<h1>Stashes</h1>

<?php $this->widget('zii.widgets.CListView', array(
    'dataProvider'=>$dataProvider,
    'itemView'=>'_view',
    'template'=>"{items}\n{pager}",
)); ?>
