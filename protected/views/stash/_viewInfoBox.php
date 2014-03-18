<?php
/* @var $this StashController */
/* @var $data Stash */
?>

<?php
    $this->beginWidget('zii.widgets.CPortlet', array(
        'title' => '<h1>'.$data->stash_name.'</h1>',
    ));
    $this->widget('bootstrap.widgets.TbDetailView', array(
        'data' => $data,
        'type' => 'bordered',
        'htmlOptions' => array('text-align' => 'center'),
        'attributes' => array(
            'type',
            //'class',
            //'attribute',
            'season',
            'complexity',
            'latitude',
            'longitude',

        ),
    ));
    echo CHtml::link(CHtml::encode('View in Map'), $data->getMapUrl());
    $this->endWidget();
?>
