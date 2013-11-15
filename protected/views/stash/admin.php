<?php
/* @var $this StashController */
/* @var $model Stash */

$this->breadcrumbs = array(
    'Stashes' => array('index'),
    'Manage',
);

$this->menu = array(
    array('label' => 'List Stash', 'url' => array('index')),
    array('label' => 'Create Stash', 'url' => array('create')),
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
?>

<h1>Manage Stashes</h1>

<p>
    You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>
        &lt;&gt;</b>
    or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search', '#', array('class' => 'search-button')); ?>
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
        'type',
        'class',
        'attribute',
        'season',
        /*
        'set_date',
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
        ),
    ),
)); ?>
