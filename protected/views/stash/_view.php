<?php
/* @var $this StashController */
/* @var $data Stash */
?>

<div class="stash">
    <div class="title">
        <?php echo CHtml::link(CHtml::encode($data->stash_name), $data->url); ?>
    </div>
    <div class="author">
        posted by <?php echo $data->user->username . ' on ' . date('F j, Y', $data->create_date); ?>
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
        <?php echo CHtml::link("Comments ({$data->commentCount})", $data->url . '#comments'); ?> |
        Last updated on <?php echo date('F j, Y', $data->update_date); ?>
    </div>
</div>