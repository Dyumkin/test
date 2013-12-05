<?php
/* @var $this StashController */
/* @var $model Stash */

$this->breadcrumbs = array(
    'Stashes' => array('index'),
    $model->stash_name,
);
?>

<?php $this->pageTitle = $model->stash_name; ?>

<?php $this->renderPartial('_view', array(
    'data' => $model,
)); ?>

<div id="comments">
    <?php if ($model->commentCount >= 1): ?>
        <h3>
            <?php echo $model->commentCount > 1 ? $model->commentCount . ' comments' : 'One comment'; ?>
        </h3>

        <?php $this->renderPartial('_comments', array(
            'stash' => $model,
            'comments' => $model->comments,
        ));?>
    <?php endif; ?>

    <h3>Leave a Comment</h3>

    <?php if (Yii::app()->user->hasFlash('commentSubmitted')): ?>
        <div class="flash-success">
            <?php echo Yii::app()->user->getFlash('commentSubmitted'); ?>
        </div>
    <?php else: ?>
        <?php $this->renderPartial('/notepad/_form', array(
            'model' => $comment,
        )); ?>
    <?php endif; ?>

</div><!-- comments -->
