<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs = array(
    'Profile' => array('index'),
    'Update',
);

$this->menu = array(
    array('label' => 'Profile', 'url' => array('index')),
    array('label' => 'Edit personal data', 'url' => array('profile/update', 'id' => Yii::app()->user->id),'itemOptions' => array('class' => 'active')),
    array('label' => 'View create stashes', 'url' => array('profile/view')),
    array('label' => 'Create Stashes', 'url' => array('stash/create')),
    array('label' => 'Founding Stashes', 'url' => array('profile/')),
);

?>

    <h1>Update User <?php echo $model->username; ?></h1>

<?php $this->renderPartial('application.components.views._userForm', array('model' => $model)); ?>