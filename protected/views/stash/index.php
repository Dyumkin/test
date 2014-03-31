<?php
/* @var $this StashController */
/* @var $dataProvider CActiveDataProvider */

$this->menu = array(
    array('label' => 'Profile', 'url' => array('profile/index')),
    array('label' => 'Edit personal data', 'url' => array('profile/update', 'id' => Yii::app()->user->id)),
    array('label' => 'View create stashes', 'url' => array('profile/view')),
    array('label' => 'Create Stashes', 'url' => array('stash/create')),
    array('label' => 'Founding Stashes', 'url' => array('profile/')),
);

$this->breadcrumbs = array(
    'Тайники',
);

?>

<h1>Тайники</h1>

<?php $this->widget('bootstrap.widgets.TbGridView', array(
    'type' => 'bordered',
    'dataProvider' => $dataProvider,
    'columns' => array(
        'stash_name',
        'type',
        'season',
        'complexity',
        'stashPlace',
        'update_date',
        array(
            'class'=>'bootstrap.widgets.TbButtonColumn',
            'template'=>'{view}',
        ),
    ),
));
?>
