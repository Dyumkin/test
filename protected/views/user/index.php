<?php
/* @var $this UserController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs = array(
    'Users',
);
?>

<h1>Users</h1>

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
