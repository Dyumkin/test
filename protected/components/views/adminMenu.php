<?php /* @var $this Controller */ ?>



<?php
$this->widget(
    'zii.widgets.CMenu',
    array(
        'htmlOptions' => array('class' => 'sidemenu'),
        'items' => array(
            array(
                'label' => 'Редактирование контента',
                'itemOptions' => array('class' => 'nav-header')
            ),
            array(
                'label' => 'История',
                'url' => array('site/update', 'attribute' => 'history'),
            ),
            array(
                'label' => 'Правила игры',
                'url' =>  array('site/update', 'attribute' => 'rules'),
            ),
            array(
                'label' => 'Советы игрокам',
                'url' => array('site/update', 'attribute' => 'advices'),
            ),
            array(
                'label' => 'Управление пользователями',
                'itemOptions' => array('class' => 'nav-header')
            ),
            array('label' => 'Игроки', 'url' => array('user/admin')),
            array(
                'label' => 'Управление тайниками',
                'itemOptions' => array('class' => 'nav-header')
            ),
            array('label' => 'Утвердить тайник'. ' (' . Stash::model()->pendingStashCount . ')',
                'url' => array('stash/admin')
            ),
            array('label' => 'Утвердить запись в блокноте'. ' (' . Notepad::model()->pendingCommentCount . ')',
                'url' => array('notepad/index'),
            ),
            '',
            array('label' => 'Выход', 'url' => array('site/logout')),

        )
    )
);
?>