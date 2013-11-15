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


    <div class="row">
        <?php echo $form->label($model, 'stash_name'); ?>
        <?php echo $form->textField($model, 'stash_name', array('size' => 60, 'maxlength' => 60)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'type'); ?>
        <?php echo $form->textField($model, 'type', array('size' => 60, 'maxlength' => 60)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'class'); ?>
        <?php echo $form->textField($model, 'class', array('size' => 32, 'maxlength' => 32)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'attribute'); ?>
        <?php echo $form->textField($model, 'attribute', array('size' => 60, 'maxlength' => 255)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'season'); ?>
        <?php echo $form->textField($model, 'season', array('size' => 60, 'maxlength' => 255)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'set_date'); ?>
        <?php echo $form->textField($model, 'set_date'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'complexity'); ?>
        <?php echo $form->textField($model, 'complexity'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'stash_description'); ?>
        <?php echo $form->textArea($model, 'stash_description', array('rows' => 6, 'cols' => 50)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'place_description'); ?>
        <?php echo $form->textArea($model, 'place_description', array('rows' => 6, 'cols' => 50)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'other_information'); ?>
        <?php echo $form->textArea($model, 'other_information', array('rows' => 6, 'cols' => 50)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'content'); ?>
        <?php echo $form->textArea($model, 'content', array('rows' => 6, 'cols' => 50)); ?>
    </div>


    <div class="row">
        <?php echo $form->label($model, 'question'); ?>
        <?php echo $form->textArea($model, 'question', array('rows' => 6, 'cols' => 50)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'status'); ?>
        <?php echo $form->textField($model, 'status'); ?>
    </div>


    <div class="row buttons">
        <?php echo CHtml::submitButton('Search'); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- search-form -->