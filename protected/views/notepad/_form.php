<?php
/* @var $this NotepadController */
/* @var $model Notepad */
/* @var $form TbActiveForm */
?>

<div class="form">

    <?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
        'id' => 'notepad-form',
        // Please note: When you enable ajax validation, make sure the corresponding
        // controller action is handling ajax validation correctly.
        // There is a call to performAjaxValidation() commented in generated controller code.
        // See class documentation of CActiveForm for details on this.
        'type' => 'inline',
        'enableAjaxValidation' => false,
    )); ?>


        <?php echo $form->textAreaRow($model, 'comment', array('rows' => 3, 'cols' => 50)); ?>
        <?php echo $form->error($model, 'comment'); ?>

<br>
<br>
        <?php echo TbHtml::submitButton($model->isNewRecord ? 'Submit' : 'Save',array('color' => TbHtml::BUTTON_COLOR_PRIMARY)); ?>


    <?php $this->endWidget(); ?>

</div><!-- form -->