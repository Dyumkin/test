<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs = array(
    'Игроки' => array('index'),
    'Управление',
);


Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#user-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Управление пользователями</h1>

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
    'id' => 'user-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        'id',
        'username',
        'e_mail',
        'name',
        'first_name',
        /*
        'last_name',
        'sex',
        'birthday',
        'phone',
        'other_information',
        'create_date',
        */
        array(
            'class' => 'CButtonColumn',
        ),
    ),
)); ?>
