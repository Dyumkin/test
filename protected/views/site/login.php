<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form TbActiveForm */

$this->pageTitle = Yii::app()->name . ' - Вход';
$this->breadcrumbs = array(
    'Вход',
);
?>

    <fieldset>

        <h1>Вход</h1>

        <p>Пожалуйста, заполните следующую форму с вашими учетными данными для входа:</p>

        <?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
            'id' => 'horizontalForm',
            'type' => 'horizontal',
            'enableClientValidation' => true,
        )); ?>

        <p class="note">Поля помеченные <span class="required">*</span> являются обязательными для заполнения.</p>

            <?php echo $form->textFieldRow($model, 'username'); ?>
            <?php echo $form->passwordFieldRow($model, 'password'); ?>
            <?php echo $form->checkBoxRow($model, 'rememberMe'); ?>

    </fieldset>

<?php echo TbHtml::formActions(array(
    TbHtml::submitButton('Войти', array('color' => TbHtml::BUTTON_COLOR_PRIMARY)),
    TbHtml::resetButton('Сбросить'),
    TbHtml::Button('Зарегистрироваться', array('color' => TbHtml::BUTTON_COLOR_SUCCESS, 'submit' => array('user/registration'))),
)); ?>

<?php $this->endWidget(); ?>