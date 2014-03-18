<?php
/* @var $this StashController */
/* @var $model Stash */
/* @var $form CActiveForm */
?>

<div class="wide form">

    <?php $form = $this->beginWidget('CActiveForm', array(
        'action' => Yii::app()->createUrl($this->route),
        'method' => 'get',
    )); ?>



        <?php echo $form->label($model, 'stash_name'); ?>
        <?php echo $form->textField($model, 'stash_name', array('size' => 60, 'maxlength' => 60)); ?>



        <?php echo $form->label($model, 'type'); ?>
        <?php echo $form->textField($model, 'type', array('size' => 60, 'maxlength' => 60)); ?>



        <?php echo $form->label($model, 'class'); ?>
        <?php echo $form->textField($model, 'class', array('size' => 32, 'maxlength' => 32)); ?>



        <?php echo $form->label($model, 'attribute'); ?>
        <?php echo $form->textField($model, 'attribute', array('size' => 60, 'maxlength' => 255)); ?>


        <?php echo $form->label($model, 'season'); ?>
        <?php echo $form->textField($model, 'season', array('size' => 60, 'maxlength' => 255)); ?>



        <?php echo $form->label($model, 'complexity'); ?>
        <?php echo $form->textField($model, 'complexity'); ?>



        <?php echo $form->label($model, 'stash_description'); ?>
        <?php echo $form->textArea($model, 'stash_description', array('rows' => 6, 'cols' => 50)); ?>



        <?php echo $form->label($model, 'place_description'); ?>
        <?php echo $form->textArea($model, 'place_description', array('rows' => 6, 'cols' => 50)); ?>



        <?php echo $form->label($model, 'other_information'); ?>
        <?php echo $form->textArea($model, 'other_information', array('rows' => 6, 'cols' => 50)); ?>



        <?php echo $form->label($model, 'content'); ?>
        <?php echo $form->textArea($model, 'content', array('rows' => 6, 'cols' => 50)); ?>




        <?php echo $form->label($model, 'question'); ?>
        <?php echo $form->textArea($model, 'question', array('rows' => 6, 'cols' => 50)); ?>



        <?php echo $form->label($model, 'status'); ?>
        <?php echo $form->textField($model, 'status'); ?>




        <?php echo CHtml::submitButton('Search'); ?>


    <?php $this->endWidget(); ?>

</div><!-- search-form -->