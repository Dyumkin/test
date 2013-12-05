<ul>
	<li><?php echo CHtml::link('User manager',array('user/admin')); ?></li>
	<li><?php echo CHtml::link('Approve Stashes',array('stash/admin')); ?></li>
	<li><?php echo CHtml::link('Approve Comments',array('notepad/index')) . ' (' . Notepad::model()->pendingCommentCount . ')'; ?></li>
	<li><?php echo CHtml::link('Logout',array('site/logout')); ?></li>
</ul>