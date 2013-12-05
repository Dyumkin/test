<?php
/* @var $this UserController */
/* @var $data User */
?>

<div class="view">

    <b><?php echo CHtml::encode($data->getAttributeLabel('username')); ?>:</b>
    <?php echo CHtml::link(CHtml::encode($data->username), array('view', 'id' => $data->id)); ?>
    <br/>

    <b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
    <?php echo CHtml::encode($data->name); ?>
    <br/>

    <b><?php echo CHtml::encode($data->getAttributeLabel('first_name')); ?>:</b>
    <?php echo CHtml::encode($data->first_name); ?>
    <br/>

    <b><?php echo CHtml::encode($data->getAttributeLabel('last_name')); ?>:</b>
    <?php echo CHtml::encode($data->last_name); ?>
    <br/>

    <b><?php echo CHtml::encode($data->getAttributeLabel('create_date')); ?>:</b>
    <?php echo CHtml::encode($data->create_date); ?>
    <br/>


</div>