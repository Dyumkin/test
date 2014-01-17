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

    <?php echo $form->dropDownListRow($model, 'complexity', range(0,5)); ?>

    <?php $this->widget('WidgetProvider', array('model' => $model)); ?>

    <?php echo $form->textFieldRow($model, 'latitude', array('size' => 60, 'maxlength' => 255)); ?>

    <?php echo $form->textFieldRow($model, 'longitude', array('size' => 60, 'maxlength' => 255)); ?>

    <?php echo $form->ckEditorRow($model,
        'place_description',
        array(
            'options' => array(
                'fullpage' => 'js:true',
                'width' => '570',
                'resize_maxWidth' => '570',
                'resize_minWidth' => '320',
                'customConfig' => '/js/ckeditor-config/config.js',
            )
        )); ?>

    <?php echo $form->ckEditorRow($model,
    'stash_description',
    array(
        'options' => array(
            'fullpage' => 'js:true',
            'width' => '570',
            'resize_maxWidth' => '570',
            'resize_minWidth' => '320',
            'customConfig' => '/js/ckeditor-config/config.js',
        )
    )); ?>

    <?php echo $form->textAreaRow($model, 'other_information', array('class' => 'span6', 'rows' => 6)); ?>

    <?php echo $form->textAreaRow($model, 'content', array('class' => 'span6', 'rows' => 3)); ?>

    <?php echo $form->textAreaRow($model, 'question', array('class' => 'span6', 'rows' => 3)); ?>

    <?php echo $form->textAreaRow($model, 'answer', array('class' => 'span6', 'rows' => 3)); ?>

    <?php echo TbHtml::formActions(array(
        TbHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('color' => TbHtml::BUTTON_COLOR_PRIMARY)),
        TbHtml::resetButton('Reset'),
    )); ?>

    <?php $this->endWidget(); ?>

