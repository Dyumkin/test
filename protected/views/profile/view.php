<?php
/* @var $this ProfileController */
/* @var $dataProvider Stash */

$this->breadcrumbs = array(
    'Profile' => array('index'),
    'Creating stashes',
);

$this->menu = array(
    array('label' => 'Profile', 'url' => array('index')),
    array('label' => 'Edit personal data', 'url' => array('profile/update', 'id' => Yii::app()->user->id)),
    array('label' => 'View create stashes', 'url' => array('profile/view'),'itemOptions' => array('class' => 'active')),
    array('label' => 'Create Stashes', 'url' => array('stash/create')),
    array('label' => 'Founding Stashes', 'url' => array('profile/')),
);
?>

<h1>Stashes</h1>
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
            'template'=>'{view}{picture}',
            'viewButtonUrl' => function($data) {
                /** @var Stash $data */
                return Yii::app()->createUrl('stash/view', array("id"=>$data->primaryKey));
            },
            'buttons'=>array(
                'picture' => array(
                    'label' => 'Gallery',
                    'imageUrl' => Yii::app()->request->baseUrl.'/extensions/bootstrap/assets/bootstrap/img/glyphicons-halflings.png',
                    'url' => 'Yii::app()->createUrl("stash/gallery", array("id"=>$data->id))',
                    'options' => array('class'=>'icon-picture'),
                ),
            ),
        ),
    ),
));
?>
