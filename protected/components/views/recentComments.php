<ul>
	<?php foreach($this->getRecentComments() as $comment): ?>
	<li><?php echo $comment->getAuthorLink(); ?> on
		<?php echo CHtml::link(CHtml::encode($comment->stash->stash_name), $comment->getUrl()); ?>
	</li>
	<?php endforeach; ?>
</ul>