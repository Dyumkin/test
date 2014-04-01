<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs = array(
    'Личный кабинет' => array('index'),
    'Обновление',
);

$this->menu = array(
    array('label' => 'Личный кабинет', 'url' => array('profile/index')),
    array('label' => 'Изменение персональных данных', 'url' => array('profile/update', 'id' => Yii::app()->user->id)),
    array('label' => 'Посмотреть созданые тайники', 'url' => array('profile/view')),
    array('label' => 'Создать тайник', 'url' => array('stash/create')),
    array('label' => 'Посещённые тайники', 'url' => array('profile/')),
);

?>

    <h1>Изменение персональных данных <?php echo $model->username; ?></h1>

<?php $this->renderPartial('application.components.views._userForm', array('model' => $model)); ?>