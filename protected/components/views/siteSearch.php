<?php
/* @var $this SiteSearch */
/* @var $form CActiveForm */
?>

<div id="search">
        <h1>Поиск</h1>
        <?php $url = $this->getController()->createUrl('stash/search'); ?>
        <?php echo CHtml::beginForm($url); ?>
            <?php echo CHtml::activeTextField($form,'string', array('class' => 'textbox')) ?>
            <?php echo CHtml::error($form,'string'); ?>
            <?php echo CHtml::SubmitButton('Поиск', array('class' => 'searchbutton')); ?>
        <?php echo CHtml::endForm(); ?>
</div>