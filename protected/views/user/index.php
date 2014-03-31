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
        'username',
        'create_date',
        array(
            'class'=>'bootstrap.widgets.TbButtonColumn',
            'template'=>'{view}',
        ),
),
)); ?>
