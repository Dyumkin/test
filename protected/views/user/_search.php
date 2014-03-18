<?php
/* @var $this UserController */
/* @var $model User */
/* @var $form CActiveForm */
?>

<div class="wide form">

    <?php $form = $this->beginWidget('CActiveForm', array(
        'action' => Yii::app()->createUrl($this->route),
        'method' => 'get',
    )); ?>


        <?php echo $form->label($model, 'id'); ?>
        <?php echo $form->textField($model, 'id'); ?>



        <?php echo $form->label($model, 'username'); ?>
        <?php echo $form->textField($model, 'username', array('size' => 60, 'maxlength' => 60)); ?>



        <?php echo $form->label($model, 'e_mail'); ?>
        <?php echo $form->textField($model, 'e_mail', array('size' => 32, 'maxlength' => 32)); ?>



        <?php echo $form->label($model, 'name'); ?>
        <?php echo $form->textField($model, 'name', array('size' => 60, 'maxlength' => 60)); ?>



        <?php echo $form->label($model, 'first_name'); ?>
        <?php echo $form->textField($model, 'first_name', array('size' => 60, 'maxlength' => 60)); ?>



        <?php echo $form->label($model, 'last_name'); ?>
        <?php echo $form->textField($model, 'last_name', array('size' => 60, 'maxlength' => 60)); ?>



        <?php echo $form->label($model, 'sex'); ?>
        <?php echo $form->textField($model, 'sex', array('size' => 7, 'maxlength' => 7)); ?>



        <?php echo $form->label($model, 'birthday'); ?>
        <?php echo $form->textField($model, 'birthday'); ?>



        <?php echo $form->label($model, 'phone'); ?>
        <?php echo $form->textField($model, 'phone', array('size' => 18, 'maxlength' => 18)); ?>



        <?php echo $form->label($model, 'other_information'); ?>
        <?php echo $form->textArea($model, 'other_information', array('rows' => 6, 'cols' => 50)); ?>



        <?php echo $form->label($model, 'create_date'); ?>
        <?php echo $form->textField($model, 'create_date'); ?>



        <?php echo CHtml::submitButton('Search'); ?>


    <?php $this->endWidget(); ?>

</div><!-- search-form -->