<?php
/* @var $this ProfileController */
/* @var $dataProvider Planing */

$this->breadcrumbs = array(
    'Личный кабинет' => array('index'),
    'Запланированные маршруты',
);

$this->menu = array(
    array('label' => 'Личный кабинет', 'url' => array('profile/index')),
    array('label' => 'Изменение персональных данных', 'url' => array('profile/update', 'id' => Yii::app()->user->id)),
    array('label' => 'Посмотреть созданые тайники', 'url' => array('profile/view')),
    array('label' => 'Создать тайник', 'url' => array('stash/create')),
    array('label' => 'Посещённые тайники', 'url' => array('profile/viewFoundStash')),
);
?>

    <h1>Запланированные маршруты</h1>
<?php
$this->widget('bootstrap.widgets.TbGridView', array(
    'type' => 'bordered',
    'dataProvider' => $dataProvider,
    'columns' => array(
        'stash_name' => array(
            'name' => 'Название тайника',
            'type' => 'html',
            'value' => 'CHtml::link(CHtml::encode($data->stash->stash_name),
                         array("stash/view","id" => $data->stash->id))',
        ),
        'date' => array(
            'name' => 'date',
            'type' => 'html',
            'value' => 'Yii::app()->dateFormatter->formatDateTime($data->date, "long","")',
        ),
        array(
            'class'=>'bootstrap.widgets.TbButtonColumn',
            'template'=>'{view}',
            'viewButtonUrl' => function($data) {
                /** @var Stash $data */
                return Yii::app()->createUrl('stash/view', array("id"=>$data->stash->primaryKey));
            },
        ),
    ),
));
?>