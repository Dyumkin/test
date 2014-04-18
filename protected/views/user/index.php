<?php
/* @var $this UserController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs = array(
    'Игроки',
);
?>

<h1>Игроки</h1>

<?php $this->widget('bootstrap.widgets.TbGridView', array(
    'type' => 'bordered',
    'dataProvider' => $dataProvider,
   // 'filter' => $dataProvider,
    'columns' => array(
        'username' => array(
            'name' => 'username',
            'type'=>'html',
            'value' => 'CHtml::link(CHtml::encode($data->username),
                         array("user/view","id" => $data->id))',
        ),
        'create_date',
        'createStashCount',
        'foundStashCount',
        'points',
        array(
            'class'=>'bootstrap.widgets.TbButtonColumn',
            'template'=>'{view}',
        ),
),
)); ?>
