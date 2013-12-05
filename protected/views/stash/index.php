<?php
/* @var $this StashController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs = array(
    'Stashes',
);

?>

<h1>Stashes</h1>

<?php $this->widget('bootstrap.widgets.TbGridView', array(
    'type' => 'bordered',
    'dataProvider' => $dataProvider,
    'columns' => array(
        'stash_name',
        'type',
        'season',
        'complexity',
        'stashPlace',
        array(
            'class'=>'bootstrap.widgets.TbButtonColumn',
            'template'=>'{view}',
        ),
    ),
)); ?>
