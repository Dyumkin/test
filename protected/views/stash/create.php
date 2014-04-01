<?php
/* @var $this StashController */
/* @var $model Stash */

$this->breadcrumbs = array(
    'Тайники' => array('profile/index'),
    'Создание',
);

$this->menu = array(
    array('label' => 'Личный кабинет', 'url' => array('profile/index')),
    array('label' => 'Изменение персональных данных', 'url' => array('profile/update', 'id' => Yii::app()->user->id)),
    array('label' => 'Посмотреть созданые тайники', 'url' => array('profile/view')),
    array('label' => 'Создать тайник', 'url' => array('stash/create')),
    array('label' => 'Посещённые тайники', 'url' => array('profile/')),
);
?>

    <h1>Создание тайника</h1>

<?php $this->renderPartial('_form', array('model' => $model)); ?>