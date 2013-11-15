<?php
/* @var $this NotepadController */
/* @var $model Notepad */
/* @var $form CActiveForm */
?>

<div class="form">

    <?php $form = $this->beginWidget('CActiveForm', array(
        'id' => 'notepad-form',
        // Please note: When you enable ajax validation, make sure the corresponding
        // controller action is handling ajax validation correctly.
        // There is a call to performAjaxValidation() commented in generated controller code.
        // See class documentation of CActiveForm for details on this.
        'enableAjaxValidation' => false,
    )); ?>

    <div class="row">
        <?php echo $form->labelEx($model, 'comment'); ?>
        <?php echo $form->textArea($model, 'comment', array('rows' => 6, 'cols' => 50)); ?>
        <?php echo $form->error($model, 'comment'); ?>
    </div>

    <div class="row buttons">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Submit' : 'Save'); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->