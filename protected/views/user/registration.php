<?php
/* @var $this UserController */
/* @var $model User */
/* @var $countries array */

$this->breadcrumbs = array(
    'Users' => array('index'),
    'Registration',
);

$this->menu = array(
    array('label' => 'List User', 'url' => array('index')),
    array('label' => 'Manage User', 'url' => array('admin')),
);
?>

    <h1>Registration</h1>

<?php $this->renderPartial('_form', array('model' => $model)); ?>