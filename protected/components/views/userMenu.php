<ul>
	<li><?php echo CHtml::link('Create New Post',array('stash/create')); ?></li>
	<li><?php echo CHtml::link('Manage Posts',array('stash/admin')); ?></li>
	<li><?php echo CHtml::link('Approve Comments',array('notepad/index')) . ' (' . Notepad::model()->pendingCommentCount . ')'; ?></li>
	<li><?php echo CHtml::link('Logout',array('site/logout')); ?></li>
</ul>