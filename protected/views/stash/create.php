<?php
/* @var $this StashController */
/* @var $model Stash */

$this->breadcrumbs = array(
    'Stashes' => array('index'),
    'Create',
);

?>

    <h1>Create Stash</h1>

<?php $this->renderPartial('_form', array('model' => $model)); ?>