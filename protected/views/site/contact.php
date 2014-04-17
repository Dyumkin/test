<?php
/* @var $this SiteController */
/* @var $model ContactForm */
/* @var $form TBActiveForm */

$this->pageTitle=Yii::app()->name . ' - Обратная связь';
$this->breadcrumbs=array(
	'Контакт',
);
?>

<h1>Обратная связь</h1>

<?php if(Yii::app()->user->hasFlash('contact')): ?>

<div class="flash-success">
	<?php echo Yii::app()->user->getFlash('contact'); ?>
</div>

<?php else: ?>

<p>
    Если у вас есть деловое предложение или другие вопросы, пожалуйста, заполните следующую форму, чтобы связаться с нами. Спасибо.
</p>

<div class="form">

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'contact-form',
        'type' => 'horizontal',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>

    <p class="note">Поля с <span class="required">*</span> являются обезательными для заполнения.</p>

	<?php echo $form->errorSummary($model); ?>

		<?php echo $form->textFieldRow($model,'name'); ?>
		<?php echo $form->error($model,'name'); ?>

		<?php echo $form->textFieldRow($model,'email'); ?>
		<?php echo $form->error($model,'email'); ?>

		<?php echo $form->textFieldRow($model,'subject',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'subject'); ?>

		<?php echo $form->textAreaRow($model,'body',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'body'); ?>


	<?php if(CCaptcha::checkRequirements()): ?>

		<?php echo $form->labelEx($model,'verifyCode'); ?>
		<div>
		<?php $this->widget('CCaptcha'); ?>
		<?php echo $form->textField($model,'verifyCode'); ?>
		</div>
		<div class="hint">Пожалуйста, введите буквы, изображенные на картинке выше.
		<br/>Буквы вводятся без учета регистра.</div>
		<?php echo $form->error($model,'verifyCode'); ?>

	<?php endif; ?>


		<?php echo TbHtml::submitButton('Отправить'); ?>


<?php $this->endWidget(); ?>

</div><!-- form -->

<?php endif; ?>