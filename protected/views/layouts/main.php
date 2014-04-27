<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<title><?php echo CHtml::encode($this->pageTitle); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="language" content="ru" />
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/style.css" media="screen, projection" />
    <?php Yii::app()->bootstrap->enableCdn= true; ?>
    <script type="text/javascript"
            src="http://maps.googleapis.com/maps/api/js?key=AIzaSyAGfACAjLKdKKCsqPSD7xVYeI6Jkn96KRE&sensor=true">
    </script>




</head>
<body>
<div id="wrap">
    <div id="navbar">
        <?php $this->widget('bootstrap.widgets.TbNavbar', array(
            'type' => 'inverse',
            'brand' => 'ГеоСтэшинг',
            'collapse' => true,
            'fixed' => 'top',
            'items' => array(
                array(
                    'class' => 'bootstrap.widgets.TbMenu',
                    'items' => array(
                        array('label' => 'Главная', 'url' => array('/site/index')),

                        array('label' => 'Об игре', 'items' => array(
                            array('label' => 'История', 'url' => array('/site/history')),
                            array('label' => 'Правила игры', 'url' => array('/site/rules')),
                            array('label' => 'Советы игрокам', 'url' => array('/site/advices')),
                            array('label' => 'Игроки', 'url' => array('/user/index')),
                        ),
                        ),
                        array('label' => 'Тайники', 'items' => array(
                            array('label' => 'Тайники', 'url' => array('/stash/index')),
                            array('label' => 'Карта тайников', 'url' => array('/stash/viewMap')),
                            //array('label' => 'Список', 'url' => array('/site/list')),
                        ),
                        ),
                        array('label' => 'Контакт', 'url' => array('/site/contact')),

                    ),
                ),
                array(
                    'class' => 'bootstrap.widgets.TbMenu',
                    'htmlOptions' => array('class' => 'pull-right'),
                    'items' => array(
                        array('label' => 'Вход', 'url' => array('/site/login'), 'visible' => Yii::app()->user->isGuest),
                        array('label' => 'Регистрация', 'url' => array('/user/registration'), 'visible' => Yii::app()->user->isGuest),
                        array('label' => 'Добро пожаловать ' . Yii::app()->user->name, 'visible' => !Yii::app()->user->isGuest, 'items' => array(
                            array('label' => 'Личный кабинет', 'url' => array('/profile/index')),
                            array('label' => 'Выход (' . Yii::app()->user->name . ')', 'url' => array('/site/logout')),
                        )
                        ),
                    )
                ),
            ),
           // 'htmlOptions' => array('class' => 'header-tabs'),
        )); ?>

  </div>
    <div id="header">
        <h1 id="logo-text">Гео<span class="gray">Стэшинг</span></h1>
        <h2 id="slogan">слоган.</h2>
    </div>

    <?php if(isset($this->breadcrumbs)):?>
        <?php $this->widget('bootstrap.widgets.TbBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
    <?php endif?>


        <?php echo $content; ?>

  <div id="footer"> <span id="footer-left"> &copy; <?php echo date( 'Y', time() ); ?> <strong><?php echo CHtml::encode( Yii::app()->name ); ?></strong> </span> </div>
</div>
</body>
</html>
