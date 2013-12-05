<?php
/* @var $this StashController */
/* @var $model Stash */
/* @var $form TbActiveForm */
?>


<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'horizontalForm',
    'type' => 'horizontal',
    'enableClientValidation' => true,
)); ?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($model); ?>

    <?php echo $form->textFieldRow($model, 'stash_name', array('size' => 60, 'maxlength' => 60)); ?>

    <?php echo $form->dropDownListRow($model, 'type', $model->typeOptions, array('empty' => 'Select a stash type')); ?>

    <?php echo $form->checkBoxListRow($model, 'class', $model->classOptions); ?>

    <?php echo $form->textFieldRow($model, 'attribute', array('size' => 60, 'maxlength' => 255)); ?>

    <?php echo $form->radioButtonListRow($model, 'season', $model->seasonOptions); ?>

    <?php echo $form->dropDownListRow($model, 'complexity', range(1, 5)); ?>

    <?php $this->widget('WidgetProvider', array('model' => $model)); ?>

    <?php echo $form->textAreaRow($model, 'stash_description', array('rows' => 6, 'cols' => 50)); ?>

    <?php echo $form->textAreaRow($model, 'place_description', array('rows' => 6, 'cols' => 50)); ?>

    <?php echo $form->textAreaRow($model, 'other_information', array('rows' => 6, 'cols' => 50)); ?>

    <?php echo $form->textAreaRow($model, 'content', array('rows' => 6, 'cols' => 50)); ?>

    <?php echo $form->textAreaRow($model, 'answer', array('rows' => 6, 'cols' => 50)); ?>

    <?php echo $form->textAreaRow($model, 'question', array('rows' => 6, 'cols' => 50)); ?>

    <?php echo TbHtml::formActions(array(
        TbHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('color' => TbHtml::BUTTON_COLOR_PRIMARY)),
        TbHtml::resetButton('Reset'),
    )); ?>

    <?php $this->endWidget(); ?>

