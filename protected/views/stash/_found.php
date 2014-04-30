<?php
/* @var $this StashController */
/* @var $data Stash */
?>

<div>
   <h3><?php echo CHtml::link(CHtml::encode($data->stash_name), $data->getUrl()); ?></h3>

    <div>
        <?php echo $data->place_description; ?>
    </div>
</div>
