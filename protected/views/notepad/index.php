<?php
/* @var $this NotepadController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs = array(
    'Блокнот',
);
?>

<h1>Блокнот</h1>

<?php $this->widget('zii.widgets.CListView', array(
    'dataProvider' => $dataProvider,
    'itemView' => '_view',
)); ?>
