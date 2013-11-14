<?php
/* @var $this NotepadController */
/* @var $model Notepad */

$this->breadcrumbs=array(
	'Notepads'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);
?>

<h1>Update Notepad <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>