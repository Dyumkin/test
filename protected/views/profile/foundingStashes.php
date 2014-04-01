<?php
/* @var $this ProfileController */
/* @var $dataProvider Stash */

$this->breadcrumbs = array(
    'Личный кабинет' => array('index'),
    'Найденные тайники',
);

$this->menu = array(
    array('label' => 'Личный кабинет', 'url' => array('profile/index')),
    array('label' => 'Изменение персональных данных', 'url' => array('profile/update', 'id' => Yii::app()->user->id)),
    array('label' => 'Посмотреть созданые тайники', 'url' => array('profile/view')),
    array('label' => 'Создать тайник', 'url' => array('stash/create')),
    array('label' => 'Посещённые тайники', 'url' => array('profile/')),
);
?>

    <h1>Найденные тайники</h1>
<?php
$this->widget('bootstrap.widgets.TbGridView', array(
    'type' => 'bordered',
    'dataProvider' => $dataProvider,
    'columns' => array(
        'stash_name',
        'status',
        'type',
        'season',
        'complexity',
        'stashPlace',
        array(
            'class'=>'bootstrap.widgets.TbButtonColumn',
            'template'=>'{view}',
            'viewButtonUrl' => function($data) {
                /** @var Stash $data */
                return Yii::app()->createUrl('stash/view', array("id"=>$data->primaryKey));
            },
        ),
    ),
));
?>