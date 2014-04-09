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

    <p class="note">Поля с <span class="required">*</span> являются обезательными для заполнения.</p>

    <?php echo $form->errorSummary($model); ?>

        <?php echo $form->textFieldRow($model, 'username', array('size' => 60, 'maxlength' => 60)); ?>

        <?php echo $form->passwordFieldRow($model, 'password', array('size' => 32, 'maxlength' => 32)); ?>

        <?php echo $form->passwordFieldRow($model, 'verifyPassword', array('size' => 32, 'maxlength' => 32)); ?>

        <?php echo $form->textFieldRow($model, 'e_mail', array('prepend' => '@', 'class'=>'span-input')); ?>

        <?php echo $form->textFieldRow($model, 'name', array('size' => 60, 'maxlength' => 60)); ?>

        <?php echo $form->textFieldRow($model, 'first_name', array('size' => 60, 'maxlength' => 60)); ?>

        <?php echo $form->textFieldRow($model, 'last_name', array('size' => 60, 'maxlength' => 60)); ?>

        <?php echo $form->dropDownListRow($model, 'sex',$model->genderOptions,array('empty' => 'Выберите пол') ); ?>

        <?php /*$this->widget('WidgetProvider', array('model' => $model)); */?>


        <?php echo $form->datepickerRow($model,'birthday',array(
            'class'=>'span-input',
            'prepend'=>'<i class="icon-calendar"></i>',
                'options' => array(
                'format' => 'dd.mm.yyyy',
                'language' => 'ru',
                'autoclose'=>'true',
                'startDate'=>'1,1,1930',
                'endDate'=>'now()',
                'startView'=>2,
            ),

        )); ?>

    <?php echo $form->textFieldRow($model, 'phone', array('size' => 18, 'maxlength' => 18)); ?>

        <?php echo $form->textAreaRow($model, 'other_information', array('rows' => 6, 'cols' => 50)); ?>



            <?php /*echo $form->labelEx($model,'verifyCode'); */?><!--

                <?php /*$this->widget('CCaptcha',array('captchaAction' => '/user/captcha','showRefreshButton'=>false,)); */?>
                <?php /*echo $form->textFieldRow($model,'verifyCode'); */?>

            <div class="hint">Please enter the letters as they are shown in the image above.
                <br/>Letters are not case-sensitive.</div>
            --><?php /*echo $form->error($model,'verifyCode'); */?>




    <?php echo TbHtml::formActions(array(
        TbHtml::submitButton($model->isNewRecord ? 'Создать' : 'Сохранить', array('color' => TbHtml::BUTTON_COLOR_PRIMARY)),
        TbHtml::resetButton('Сбросить'),
    )); ?>

    <?php $this->endWidget(); ?>

