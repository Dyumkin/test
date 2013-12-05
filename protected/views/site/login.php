<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form TbActiveForm */

$this->pageTitle = Yii::app()->name . ' - Login';
$this->breadcrumbs = array(
    'Login',
);
?>

    <fieldset>

        <legend>Login</legend>

        <p>Please fill out the following form with your login credentials:</p>

        <?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
            'id' => 'horizontalForm',
            'type' => 'horizontal',
            'enableClientValidation' => true,
        )); ?>

        <p class="note">Fields with <span class="required">*</span> are required.</p>

            <?php echo $form->textFieldRow($model, 'username'); ?>
            <?php echo $form->passwordFieldRow($model, 'password', array('placeholder' => 'Password')); ?>

        <a href="<?= Yii::app()->createUrl('user/create'); ?>">Registration</a>

            <?php echo $form->checkBoxRow($model, 'rememberMe'); ?>

    </fieldset>

<?php echo TbHtml::formActions(array(
    TbHtml::submitButton('Sing in', array('color' => TbHtml::BUTTON_COLOR_PRIMARY)),
    TbHtml::resetButton('Reset'),
)); ?>

<?php $this->endWidget(); ?>