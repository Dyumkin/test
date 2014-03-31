<?php
/* @var $this UserController */
/* @var $model User */
/* @var $countries array */

$this->breadcrumbs = array(
    'Игроки' => array('index'),
    'Регистрация',
);

?>

    <h1>Регистрация</h1>

<?php $this->renderPartial('_form', array('model' => $model)); ?>