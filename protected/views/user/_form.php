<?php
/* @var $this UserController */
/* @var $model User */
/* @var $form TbActiveForm */
?>




<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'horizontalForm',
    'type' => 'horizontal',
    'enableClientValidation' => true,
    'htmlOptions' => array('enctype'=>'multipart/form-data'),
)); ?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($model); ?>

        <?php echo $form->textFieldRow($model, 'username', array('size' => 60, 'maxlength' => 60)); ?>

        <?php echo $form->passwordFieldRow($model, 'password', array('size' => 32, 'maxlength' => 32)); ?>

        <?php echo $form->passwordFieldRow($model, 'verifyPassword', array('size' => 32, 'maxlength' => 32)); ?>

        <?php echo $form->textFieldRow($model, 'e_mail', array('prepend' => '@')); ?>

        <?php echo $form->textFieldRow($model, 'name', array('size' => 60, 'maxlength' => 60)); ?>

        <?php echo $form->textFieldRow($model, 'first_name', array('size' => 60, 'maxlength' => 60)); ?>

        <?php echo $form->textFieldRow($model, 'last_name', array('size' => 60, 'maxlength' => 60)); ?>

        <?php echo $form->dropDownListRow($model, 'sex',$model->genderOptions,array('empty' => 'Select a gender') ); ?>

        <?php $this->widget('WidgetProvider', array('model' => $model)); ?>


        <?php echo $form->datepickerRow($model,'birthday',array(
            'prepend'=>'<i class="icon-calendar"></i>',
            'options' => array(
                'format' => 'dd.mm.yyyy',
                'language' => 'ru',
                'autoclose'=>'true',
                'startDate'=>'1,1,1920',
                'endDate'=>'now()',
                'startView'=>2,
            ),

        )); ?>

    <?php echo $form->textFieldRow($model, 'phone', array('size' => 18, 'maxlength' => 18)); ?>

        <?php echo $form->textAreaRow($model, 'other_information', array('rows' => 6, 'cols' => 50)); ?>

    <?php echo TbHtml::formActions(array(
        TbHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('color' => TbHtml::BUTTON_COLOR_PRIMARY)),
        TbHtml::resetButton('Reset'),
    )); ?>

    <?php $this->endWidget(); ?>

