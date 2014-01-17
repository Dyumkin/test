<?php
/* @var $this StashController */
/* @var $model Stash */

$this->breadcrumbs = array(
    'Profile' => array('profile/index'),
    'Create',
);

$this->menu = array(
    array('label' => 'Profile', 'url' => array('index')),
    array('label' => 'Edit personal data', 'url' => array('profile/update', 'id' => Yii::app()->user->id)),
    array('label' => 'View create stashes', 'url' => array('profile/view')),
    array('label' => 'Create Stashes', 'url' => array('stash/create'),'itemOptions' => array('class' => 'active')),
    array('label' => 'Founding Stashes', 'url' => array('profile/')),
);
?>

    <h1>Create Stash</h1>

<?php $this->renderPartial('_form', array('model' => $model)); ?>