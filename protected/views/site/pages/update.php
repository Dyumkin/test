<?php
/* @var $this SiteController */
/* @var $model SiteContent */
/* @var $form TbActiveForm */

$this->breadcrumbs = array(
    $model->name => array('pages/index'),
    'Update',
);
?>

<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'horizontalForm',
    'type' => 'horizontal',
    'enableClientValidation' => true,
)); ?>

    <h1 class="text-center">Update Content <?php echo $model->name; ?></h1>

<?php echo $form->ckEditorRow($model,
    'content',
    array(
        'options' => array(
            'fullpage' => 'js:true',
            'width' => '700',
            'resize_maxWidth' => '800',
            'resize_minWidth' => '700',
            'customConfig' => '/js/ckeditor-config/config.js',
        )
    )); ?>

<?php echo TbHtml::formActions(array(
    TbHtml::submitButton('Save', array('color' => TbHtml::BUTTON_COLOR_PRIMARY)),
)); ?>

<?php $this->endWidget(); ?>