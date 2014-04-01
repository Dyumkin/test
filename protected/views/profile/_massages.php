<?php
/* @var $this ProfileController */
/* @var $model Massage */
?>

<div class="massage">
    <h3>Сообщения</h3>
    <?php foreach ($model as $massage): ?>
        <div class="alert-success">
            <div class="time">
                <?php echo Yii::app()->dateFormatter->formatDateTime($massage->date, 'full'); ?>
            </div>
            <?php echo $massage->massage; ?>
        </div>
    <?php endforeach; ?>
</div>