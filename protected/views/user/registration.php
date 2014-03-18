<?php
/* @var $this UserController */
/* @var $model User */
/* @var $countries array */

$this->breadcrumbs = array(
    'Users' => array('index'),
    'Registration',
);

?>

    <h1>Registration</h1>

<?php $this->renderPartial('_form', array('model' => $model)); ?>