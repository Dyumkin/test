<?php
/* @var $this StashController */
/* @var $dataProvider CActiveDataProvider */

$this->menu = array(
    array('label' => 'Личный кабинет', 'url' => array('profile/index')),
    array('label' => 'Изменение персональных данных', 'url' => array('profile/update', 'id' => Yii::app()->user->id)),
    array('label' => 'Посмотреть созданые тайники', 'url' => array('profile/view')),
    array('label' => 'Создать тайник', 'url' => array('stash/create')),
    array('label' => 'Посещённые тайники', 'url' => array('profile/')),
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
        'stash_name' => array(
            'name' => 'stash_name',
            'type'=>'html',
            'value' => 'CHtml::link(CHtml::encode($data->stash_name),
                         array("stash/view","id" => $data->id))',
        ),
        'type',
        'season',
        'complexity',
        //'stashPlace',
        'update_date',
        array(
            'class'=>'bootstrap.widgets.TbButtonColumn',
            'template'=>'{info} {view}',
            'buttons'=>array(
                'info' => array(
                    //'label' => 'Тайник не разгадан',
                    'imageUrl' => '/images/system/pic.jpg',
                    'url' =>'Yii::app()->createUrl("stash/view",array("id"=>$data->id))',
                    'options'=>array(
                        'id' => 'tooltip',
                        'title' => 'Тайник не разгадан'),
                    'visible'=> '$data->getVisitCount() < "1"',
                ),
            ),
        ),
    ),
));
?>

<script>
    $(function() {
        $('body').tooltip({
            selector: "[id=tooltip]"
        });
    });
</script>
