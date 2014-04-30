<?php
/* @var $this StashController */
/* @var $model Stash */

$this->breadcrumbs = array(
    'Тайники' => array('index'),
    'Управление',
);

$this->menu = array(
    array('label' => 'Список тайников', 'url' => array('index')),
    array('label' => 'Создать тайник', 'url' => array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#stash-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");

Yii::app()->clientScript->registerScript('approve', "
jQuery('#stash-grid a.approve').live('click',function() {
        if(!confirm('Вы действительно хотите утвердить этот тайник?')) return false;

        var url = $(this).attr('href');
        //  do your post request here
        $.post(url,function(){
             $.fn.yiiGridView.update('stash-grid');
         });
        return false;
});
");
?>

<h1>Управление тайниками</h1>

<p>
    Вы можете дополнительно ввести оператор сравнения (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>
        &lt;&gt;</b>
    или <b>=</b>) в начале каждого из ваших условий поиска, чтобы указать, как сравнение должно быть сделано.
</p>

<?php echo CHtml::link('Расширенный поиск', '#', array('class' => 'search-button')); ?>
<div class="search-form" style="display:none">
    <?php $this->renderPartial('_search', array(
        'model' => $model,
    )); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'stash-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        'id',
        'stash_name',
        'status' => array(
            'name' => 'status',
            'value' => '$data->status',
            'sortable'=>true,
        ),
        'createStashDate',
        'user_id' => array(
            'name' => 'user_id',
            'type' => 'html',
            'value' => '$data->user->username',

        ),
        /*
                'type',
                'class',
                'attribute',
                'season',
                'coordinates',
                'complexity',
                'stash_description',
                'place_description',
                'other_information',
                'content',
                'answer',
                'question',
                'status',
                'user_id',
                */
        array(
            'class' => 'CButtonColumn',
            'template'=>'{view}{update}{approve}{delete}',
            'buttons'=>array(
                'approve' => array(
                    'label' => 'Утвердить тайник',
                    'imageUrl' => '/images/system/green_checkmark.png',
                    'url' =>'Yii::app()->createUrl("stash/approve",array("id"=>$data->id))',
                    'options'=>array('class'=>'approve'),
                    'visible'=> '$data->status == "1"',
                ),
            ),
        ),
    ),
)); ?>
