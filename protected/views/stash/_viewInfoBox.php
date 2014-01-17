<?php
/* @var $this StashController */
/* @var $data Stash */
?>

<?php
    $this->beginWidget('zii.widgets.CPortlet', array(
        'title' => $data->stash_name,
    ));
    $this->widget('bootstrap.widgets.TbDetailView', array(
        'data' => $data,
        'attributes' => array(
            'type',
            //'class',
            'attribute',
            'season',
            'complexity',
            'latitude',
            'longitude',

        ),
    ));
    $this->endWidget();
?>
