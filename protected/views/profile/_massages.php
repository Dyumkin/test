<?php
/* @var $this ProfileController */
/* @var $model Profile */
?>

<div class="massage">
    <h3>Your massages</h3>
    <?php foreach ($model as $massage): ?>
        <div class="alert-success">
            <div class="time">
                <?php echo Yii::app()->dateFormatter->formatDateTime($massage->date, 'full'); ?>
            </div>
            <?php echo $massage->massage; ?>
        </div>
    <?php endforeach; ?>
</div>