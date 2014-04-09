<?php
/* @var $this StashController */
/* @var $model Stash */
?>



<?php if ($model->commentCount >= 1): ?>
    <h3>
        <?php echo $model->commentCount > 1 ? $model->commentCount . ' записи' : 'Одна запись'; ?>
    </h3>
<?php endif; ?>

<?php
/* @var $comments Notepad */
foreach ($comments as $comment):
    ?>
    <div class="comment" id="c<?php echo $comment->id; ?>">

        <div class="author">
            <?php echo $comment->getUserLink(); ?> :
        </div>

        <div class="time">
            <?php echo Yii::app()->dateFormatter->formatDateTime($comment->comment_date, 'full'); ?>
        </div>

        <div class="comment-content">
            <?php echo nl2br(CHtml::encode($comment->comment)); ?>
        </div>

    </div><!-- comment -->
<?php endforeach; ?>

<?php if (!Yii::app()->user->isGuest): ?>
    <h3>Оставить запись</h3>

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
