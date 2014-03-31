<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs = array(
    'Игроки' => array('index'),
    $model->username => array('profile/index', 'id' => $model->id),
    'Обновление',
);

?>

    <h1>Изменение персональных данных игрока <?php echo $model->username; ?></h1>

<?php $this->renderPartial('_form', array('model' => $model)); ?>