<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs = array(
    'Users' => array('index'),
    $model->username,
);

?>

<h1>View User: <?php echo $model->username; ?></h1>

<?php if ($model->preview->hasImage())
    echo CHtml::image($model->preview->getUrl('preview'), 'Preview image version');
else
    echo CHtml::image(Yii::app()->request->baseUrl. '/images/avatar/no_avatar.jpg' ,'no image uploaded');
?>

<div class="row">
    <div class="span4 offset2">
<?php $this->widget('bootstrap.widgets.TbDetailView', array(
    'data' => $model,
    'attributes' => array(
        'username',
        'e_mail',
        'name',
        'first_name',
        'last_name',
        'sex',
        'userPlace',
        'birthday',
        'phone',
        'other_information',
        'create_date',
    ),
)); ?>
    </div>
</div>