<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<title><?php echo CHtml::encode($this->pageTitle); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="language" content="en" />
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
            'brand' => 'GeoStashing',
            'collapse' => true,
            'fixed' => 'top',
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
           // 'htmlOptions' => array('class' => 'header-tabs'),
        )); ?>

  </div>
    <div id="header">
        <h1 id="logo-text">Geo<span class="gray">stashing</span></h1>
        <h2 id="slogan">put your site slogan here...</h2>
    </div>

    <?php if(isset($this->breadcrumbs)):?>
        <?php $this->widget('bootstrap.widgets.TbBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
    <?php endif?>


        <?php echo $content; ?>

  <div id="footer"> <span id="footer-left"> &copy; <?php echo date( 'Y', time() ); ?> <strong><?php echo CHtml::encode( Yii::app()->name ); ?></strong> | Design by: <strong><a href="http://www.styleshout.com/">styleshout</a></strong> | Valid: <a href="http://validator.w3.org/check?uri=referer">XHTML</a> | <a href="http://jigsaw.w3.org/css-validator/check/referer">CSS</a> </span> <span id="footer-right"> <a href="http://www.free-css.com/">Home</a> | <a href="http://www.free-css.com/">Sitemap</a> | <a href="http://www.free-css.com/">Home</a> </span> </div>
</div>
</body>
</html>
