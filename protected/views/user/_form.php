<?php
/* @var $this UserController */
/* @var $model User */
/* @var $form CActiveForm */
?>


<div class="form">

    <?php $form = $this->beginWidget('CActiveForm', array(
        'id' => 'user-form',
        // Please note: When you enable ajax validation, make sure the corresponding
        // controller action is handling ajax validation correctly.
        // There is a call to performAjaxValidation() commented in generated controller code.
        // See class documentation of CActiveForm for details on this.
        'enableAjaxValidation' => false,
    )); ?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($model); ?>

    <div class="row">
        <?php echo $form->labelEx($model, 'username'); ?>
        <?php echo $form->textField($model, 'username', array('size' => 60, 'maxlength' => 60)); ?>
        <?php echo $form->error($model, 'username'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'password'); ?>
        <?php echo $form->passwordField($model, 'password', array('size' => 32, 'maxlength' => 32)); ?>
        <?php echo $form->error($model, 'password'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'verifyPassword'); ?>
        <?php echo $form->passwordField($model, 'verifyPassword', array('size' => 32, 'maxlength' => 32)); ?>
        <?php echo $form->error($model, 'verifyPassword'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'e_mail'); ?>
        <?php echo $form->emailField($model, 'e_mail', array('size' => 32, 'maxlength' => 32)); ?>
        <?php echo $form->error($model, 'e_mail'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'name'); ?>
        <?php echo $form->textField($model, 'name', array('size' => 60, 'maxlength' => 60)); ?>
        <?php echo $form->error($model, 'name'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'first_name'); ?>
        <?php echo $form->textField($model, 'first_name', array('size' => 60, 'maxlength' => 60)); ?>
        <?php echo $form->error($model, 'first_name'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'last_name'); ?>
        <?php echo $form->textField($model, 'last_name', array('size' => 60, 'maxlength' => 60)); ?>
        <?php echo $form->error($model, 'last_name'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'sex'); ?>
        <?php echo $form->dropDownList($model, 'sex',$model->genderOptions,array('empty' => 'Select a gender') ); ?>
        <?php echo $form->error($model, 'sex'); ?>
    </div>


    <?php echo $form->labelEx($model, 'birthday'); ?>
    <?php
    echo $this->widget('zii.widgets.jui.CJuiDatePicker', array(
        'name' => 'birthday',
        'language' => 'ru',
        'model' => $model,
        'attribute' => 'birthday',
        'options' => array(
            'showAnim' => 'fold',
            'yearRange'=>'-70:+0',
            'changeMonth' => 'true',
            'changeYear' => 'true',
            'constrainInput' => 'false',
        ),
        'htmlOptions' => array(
            'style' => 'height:20px;',
        ),

        // DONT FORGET TO ADD TRUE this will create the datepicker return
        // as string
    ), true);
    ?>
    <?php echo $form->error($model,'birthday'); ?>

    <div class="row">
        <?php echo $form->labelEx($model, 'phone'); ?>
        <?php echo $form->telField($model, 'phone', array('size' => 18, 'maxlength' => 18)); ?>
        <?php echo $form->error($model, 'phone'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'other_information'); ?>
        <?php echo $form->textArea($model, 'other_information', array('rows' => 6, 'cols' => 50)); ?>
        <?php echo $form->error($model, 'other_information'); ?>
    </div>

    <div class="row buttons">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->