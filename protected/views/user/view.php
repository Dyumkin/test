<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs = array(
    'Users' => array('index'),
    $model->username,
);

$this->menu = array(
    array('label' => 'Update User', 'url' => array('update', 'id' => $model->id)),
    array('label' => 'Delete User', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm' => 'Are you sure you want to delete this item?')),
    array('label' => 'Manage User', 'url' => array('admin')),
);
?>

<h1>View User #<?php echo $model->username; ?></h1>
<div class="row">
    <div class="span4">
        <?php
        $avaBigUrl = $model->avaImgBehavior->getFileUrl('ava_big');
        if ($avaBigUrl) {
            echo CHtml::image($avaBigUrl);
        }
        ?>
    </div>
</div>
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