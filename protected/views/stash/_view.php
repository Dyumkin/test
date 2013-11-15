<?php
/* @var $this StashController */
/* @var $data Stash */
?>

<div class="stash">
    <div class="title">
        <?php echo CHtml::link(CHtml::encode($data->stash_name), array('view', 'id' => $data->id)); ?>
    </div>
    <div class="author">
        posted
        by <?php echo $data->user->username . ' on ' . Yii::app()->dateFormatter->formatDateTime($data->create_date, 'full'); ?>
    </div>
    <div class="stash">
        <?php
        $this->beginWidget('CMarkdown', array('purifyOutput' => true));
        echo $data->stash_description;
        $this->endWidget();
        ?>
    </div>
    <div class="nav">
        <?php echo CHtml::link('Permalink', $data->url); ?> |
        <?php echo CHtml::link("Comments ({$data->commentCount})", array('view', 'id' => $data->id)); ?> |
        Last updated on <?php echo Yii::app()->dateFormatter->formatDateTime($data->update_date, 'full'); ?>
    </div>
</div>