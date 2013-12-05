<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs = array(
    'Profile' => array('index'),
    'Update',
);

?>

    <h1>Update User <?php echo $model->id; ?></h1>

<?php $this->renderPartial('application.components.views._userForm', array('model' => $model)); ?>