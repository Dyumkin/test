<ul>
	<?php foreach($this->getRecentComments() as $comment): ?>
	<li><?php echo $comment->authorLink; ?> on
		<?php echo CHtml::link(CHtml::encode($comment->stash->stash_name), $comment->getUrl()); ?>
	</li>
	<?php endforeach; ?>
</ul>