<?php /* @var $this Controller */ ?>



<?php
$this->widget(
    'bootstrap.widgets.TbMenu',
    array(
        'type' => 'list',
        'items' => array(
            array(
                'label' => 'Update site content',
                'itemOptions' => array('class' => 'nav-header')
            ),
            array(
                'label' => 'History',
                'url' => array('site/update', 'attribute' => 'history'),
            ),
            array(
                'label' => 'Rules',
                'url' =>  array('site/update', 'attribute' => 'rules'),
            ),
            array(
                'label' => 'Advices',
                'url' => array('site/update', 'attribute' => 'advices'),
            ),
            array(
                'label' => 'Manage user',
                'itemOptions' => array('class' => 'nav-header')
            ),
            array('label' => 'User manager', 'url' => array('user/admin')),
            array(
                'label' => 'Stash manage',
                'itemOptions' => array('class' => 'nav-header')
            ),
            array('label' => 'Approve Stashes'. ' (' . Stash::model()->pendingStashCount . ')',
                'url' => array('stash/admin')
            ),
            array('label' => 'Approve Comments'. ' (' . Notepad::model()->pendingCommentCount . ')',
                'url' => array('notepad/index'),
            ),
            '',
            array('label' => 'Logout', 'url' => array('site/logout')),

        )
    )
);
?>