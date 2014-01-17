<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />

    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/styles.css" />
    <?php Yii::app()->bootstrap->enableCdn= true; ?>
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->

    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />

    <script type="text/javascript"
            src="http://maps.googleapis.com/maps/api/js?key=AIzaSyAGfACAjLKdKKCsqPSD7xVYeI6Jkn96KRE&sensor=true">
    </script>

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<div class="container" id="page">

	<div id="header">
		<div id="logo"><?php echo CHtml::encode(Yii::app()->name); ?></div>
	</div><!-- header -->

	<div id="navbar">
        <?php $this->widget('bootstrap.widgets.TbNavbar', array(
            'type' => 'inverse',
            'brand' => 'Title',
            'brandUrl' => '#',
            'collapse' => true,
            'items' => array(
                array(
                    'class' => 'bootstrap.widgets.TbMenu',
                    'items' => array(
                        array('label' => 'Home', 'url' => array('/site/index')),

                        array('label' => 'About game', 'items' => array(
                                array('label' => 'History', 'url' => array('/site/history')),
                                array('label' => 'Rules', 'url' => array('/site/rules')),
                                array('label' => 'Advice', 'url' => array('/site/advices')),
                                array('label' => 'Players', 'url' => array('/user/index')),
                            ),
                        ),
                        array('label' => 'Stashes', 'items' => array(
                                array('label' => 'Stashes', 'url' => array('/stash/index')),
                                array('label' => 'Geocaches map', 'url' => array('/stash/viewMap')),
                                array('label' => 'List of geocaches', 'url' => array('/site/list')),
                            ),
                        ),
                        array('label' => 'Contact', 'url' => array('/site/contact')),
                        array('label' => 'Login', 'url' => array('/site/login'), 'visible' => Yii::app()->user->isGuest),

                        array('label' => 'Welcome ' . Yii::app()->user->name, 'visible' => !Yii::app()->user->isGuest, 'items' => array(
                                array('label' => 'Private Office', 'url' => array('/profile/index')),
                                array('label' => 'Logout (' . Yii::app()->user->name . ')', 'url' => array('/site/logout')),
                            )
                        ),
                    ),
                ),
            ),
        )); ?>
	</div><!-- mainmenu -->
	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('bootstrap.widgets.TbBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>

	<?php echo $content; ?>

	<div class="clear"></div>

	<div id="footer">
		Copyright &copy; <?php echo date('Y'); ?> by My Company.<br/>
		All Rights Reserved.<br/>
		<?php echo Yii::powered(); ?>
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>
