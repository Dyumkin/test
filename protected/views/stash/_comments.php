<?php
/* @var $this StashController */
/* @var $model Stash */
?>



<?php if ($model->commentCount >= 1): ?>
    <h3>
        <?php echo $model->commentCount > 1 ? $model->commentCount . ' comments' : 'One comment'; ?>
    </h3>
<?php endif; ?>

<?php
/* @var $comments Notepad */
foreach ($comments as $comment):
    ?>
    <div class="comment" id="c<?php echo $comment->id; ?>">


        <?php
        /*
            echo CHtml::link("#{$comment->id}", $comment->getUrl($stash), array(
            'class'=>'cid',
            'title'=>'Permalink to this comment',
        ));
        */
        ?>


        <div class="author">
            <?php echo $comment->getUserLink(); ?> says:
        </div>

        <div class="time">
            <?php echo Yii::app()->dateFormatter->formatDateTime($comment->comment_date, 'full'); ?>
        </div>

        <div class="content">
            <?php echo nl2br(CHtml::encode($comment->comment)); ?>
        </div>

    </div><!-- comment -->
<?php endforeach; ?>

<?php if (!Yii::app()->user->isGuest): ?>
    <h3>Leave a Comment</h3>

    <?php if (Yii::app()->user->hasFlash('commentSubmitted')): ?>
        <div class="flash-success">
            <?php echo Yii::app()->user->getFlash('commentSubmitted'); ?>
        </div>
    <?php else: ?>
        <?php $this->renderPartial('/notepad/_form', array(
            'model' => $notepad,
        )); ?>
    <?php endif; ?>

<?php endif; ?>
