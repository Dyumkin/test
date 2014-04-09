<?php
/* @var $this ProfileController */
/* @var $model Massage */
?>
<div id="massage">
    <h3 class="text-center">Сообщения</h3>
    <div class="massage">
        <?php foreach ($model as $massage): ?>
            <div class="alert-info">
                <div class="time">
                    <?php echo Yii::app()->dateFormatter->formatDateTime($massage->date, 'full'); ?>
                </div>
                <?php echo $massage->massage; ?>
                <hr>
            </div>
        <?php endforeach; ?>
    </div>
</div>