<?php
/* @var $this StashController */
/* @var $model Stash */
/* @var $form CActiveForm */
?>

<div class="form">

    <?php $form = $this->beginWidget('CActiveForm', array(
        'id' => 'stash-form',
        // Please note: When you enable ajax validation, make sure the corresponding
        // controller action is handling ajax validation correctly.
        // There is a call to performAjaxValidation() commented in generated controller code.
        // See class documentation of CActiveForm for details on this.
        'enableAjaxValidation' => false,
    )); ?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($model); ?>

    <div class="row">
        <?php echo $form->labelEx($model, 'stash_name'); ?>
        <?php echo $form->textField($model, 'stash_name', array('size' => 60, 'maxlength' => 60)); ?>
        <?php echo $form->error($model, 'stash_name'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'type'); ?>
        <?php echo $form->textField($model, 'type', array('size' => 60, 'maxlength' => 60)); ?>
        <?php echo $form->error($model, 'type'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'class'); ?>
        <?php echo $form->textField($model, 'class', array('size' => 32, 'maxlength' => 32)); ?>
        <?php echo $form->error($model, 'class'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'attribute'); ?>
        <?php echo $form->textField($model, 'attribute', array('size' => 60, 'maxlength' => 255)); ?>
        <?php echo $form->error($model, 'attribute'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'season'); ?>
        <?php echo $form->textField($model, 'season', array('size' => 60, 'maxlength' => 255)); ?>
        <?php echo $form->error($model, 'season'); ?>
    </div>

    <div class="row">
        <?=$form->labelEx($model, 'set_date')?>
        <?php
        $form->widget('zii.widgets.jui.CJuiDatePicker', array(
            'model' => $model,
            'attribute' => 'set_date',
            'flat' => false,
            'options' => array(
                'dateFormat' => 'M d, yy',
            ),
            'htmlOptions' => array(
                'class' => 'span-5',
                'value' => ($set_date = $model->set_date) ? Yii::app()->getDateFormatter()->format("MMM d, y", $set_date) : '',
            ),
        ));
        ?>
        <?=$form->error($model, 'set_date')?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'complexity'); ?>
        <?php echo $form->textField($model, 'complexity'); ?>
        <?php echo $form->error($model, 'complexity'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'stash_description'); ?>
        <?php echo $form->textArea($model, 'stash_description', array('rows' => 6, 'cols' => 50)); ?>
        <?php echo $form->error($model, 'stash_description'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'place_description'); ?>
        <?php echo $form->textArea($model, 'place_description', array('rows' => 6, 'cols' => 50)); ?>
        <?php echo $form->error($model, 'place_description'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'other_information'); ?>
        <?php echo $form->textArea($model, 'other_information', array('rows' => 6, 'cols' => 50)); ?>
        <?php echo $form->error($model, 'other_information'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'content'); ?>
        <?php echo $form->textArea($model, 'content', array('rows' => 6, 'cols' => 50)); ?>
        <?php echo $form->error($model, 'content'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'answer'); ?>
        <?php echo $form->textArea($model, 'answer', array('rows' => 6, 'cols' => 50)); ?>
        <?php echo $form->error($model, 'answer'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'question'); ?>
        <?php echo $form->textArea($model, 'question', array('rows' => 6, 'cols' => 50)); ?>
        <?php echo $form->error($model, 'question'); ?>
    </div>

    <div class="row buttons">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->