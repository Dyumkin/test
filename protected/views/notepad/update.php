<?php
/* @var $this NotepadController */
/* @var $model Notepad */

$this->breadcrumbs = array(
    'Блокнот' => array('index'),
    $model->id => array('view', 'id' => $model->id),
    'Редактирование записи',
);
?>

    <h1>Редактировать запись<?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model' => $model)); ?>