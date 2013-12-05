<?php
/* @var $this StashController */
/* @var $data Stash */
?>

<div class="stash">
    <div class="title">
       <h2> <?php echo CHtml::link(CHtml::encode($data->stash_name), array('view', 'id' => $data->id)); ?>  <h2>
    </div>
    <div class="author">
        <address>
            Create by
            <strong><?php echo $data->user->username . '</strong><br> on ' . $data->create_date; ?><br>
                Update (<?php echo $data->update_date ?>)
        </address>
    </div>
    <div class="stash">
        <?php // $this->beginWidget('CMarkdown', array('purifyOutput' => true)); ?>
        <div class="place_description">
           <h5> Description of the area </h5>
            <?php echo $data->place_description; ?>
        </div>
        <div class="stash_description">
            <h5> Description of the cache </h5>
            <?php echo $data->stash_description; ?>
        </div>
        <div class="stash_content">
            <h5> The contents of the cache </h5>
            <?php echo $data->content; ?>
        </div>
        <div class="question">
            <h5> Control question </h5>
            <?php echo $data->question; ?>
        </div>
        <?php // $this->endWidget(); ?>

    </div>
    <div class="nav">
        <?php echo CHtml::link('Permalink', $data->url); ?> |
        <?php echo CHtml::link("Comments ({$data->commentCount})", array('view', 'id' => $data->id)); ?> |
        Last updated on <?php echo Yii::app()->dateFormatter->formatDateTime($data->update_date, 'full'); ?>
    </div>
</div>