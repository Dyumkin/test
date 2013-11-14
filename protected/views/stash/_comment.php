<?php
/* @var $comments Notepad */
/* @var $form CActiveForm */
foreach($comments as $comment):
?>
    <div class="comment" id="c<?php echo $comment->id; ?>">

        <?php echo CHtml::link("#{$comment->id}", $comment->getUrl($stash), array(
            'class'=>'cid',
            'title'=>'Permalink to this comment',
        ));?>

        <div class="author">
            <?php echo $comment->authorLink; ?> says:
        </div>

        <div class="time">
            <?php echo date('F j, Y \a\t h:i a',$comment->create_date); ?>
        </div>

        <div class="content">
            <?php echo nl2br(CHtml::encode($comment->comment)); ?>
        </div>

    </div><!-- comment -->
<?php endforeach; ?>