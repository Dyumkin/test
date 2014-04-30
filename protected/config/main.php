<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');
// Define a path alias for the Bootstrap extension as it's used internally.
// In this example we assume that you unzipped the extension under protected/extensions.

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'"ГеоСтэшинг"',
    'language' => 'ru',

	// preloading 'log' component
	'preload'=>array('log'),

    'aliases' => array(
        'bootstrap' => realpath(__DIR__ . '/../extensions/bootstrap'), // change this if necessary
    ),

    'controllerMap' => array(
        'image' => array('class' => 'vendor.crisu83.yii-imagemanager.controllers.ImageController'),
        'gallery' => array('class' => 'application.extensions.galleryManager.GalleryController'),
    ),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
        'bootstrap.helpers.TbHtml',
        'application.extensions.image.*',
        'application.extensions.imageAttachment.*',
        'application.extensions.EGMap.*',
        'application.extensions.galleryManager.*',
        'application.extensions.galleryManager.models.*',
        'application.modules.srbac.controllers.SBaseController',
        'application.modules.srbac.views.*',
    ),

    'theme'=>'bootstrap', // requires you to copy the theme under your themes directory

	'modules'=>array(
		// uncomment the following to enable the Gii tool

		'gii'=>array(
            'generatorPaths'=>array(
                'bootstrap.gii'),
			'class'=>'system.gii.GiiModule',
			'password'=>'123123',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
		),

        'srbac'   => array(
            // Модель для работы с таблицой пользователей
            'userclass' => 'User',
            // Уникальный идентификатор пользователя
            'userid'    => 'id',
            // Название поля содержащего имя пользователя
            'username'  => 'username',
            // В режиме отладки все пользователи могут управлять правилами доступа
            'debug'     => true,
            // Колличество пунктов выводимых на 1 странице
            'pageSize'  => 20,
            // Название роли супер пользователя
            'superUser' => 'Authority',
            // Файл стилей для модуля
            'css'       => 'srbac.css',
            // Сообщение для не авторизированных пользователей, попытавшихся получить доступ к закрытым для них разделам сайта
            'notAuthorizedView' => 'application.views.site.unauthorized',
            // Операции разрещенные польщователю
            'userActions'          => array('Show','View','List','Index'),
            //
            'listBoxNumberOfLines' => 15,
            // Путь к картинкам
            'imagesPath'           => 'application.modules.srbac.images',
            //
            'imagesPack'           => 'noia',
            //
            'iconText'             => true,),
	),



	// application components
	'components'=>array(
        'bootstrap'=>array(
            'class' => 'bootstrap.components.Bootstrap',
        ),

		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
		),


        'image'=>array(
            'class'=>'CImageComponent',
            // GD or ImageMagick
            'driver'=>'GD',
            // ImageMagick setup path
            'params'=>array('directory'=>'C:\imagemagick'),
        ),

        // uncomment the following to enable URLs in path-format
		/*
		'urlManager'=>array(
			'urlFormat'=>'path',
			'rules'=>array(
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),


		*/

        'urlManager' => array(
            'urlFormat' => 'path',
            'showScriptName' => false,
            'rules' => array(
                '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
            ),
        ),
        /*
		'db'=>array(
			'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
		),
        */
		// uncomment the following to use a MySQL database

		'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=geocaching',
			'emulatePrepare' => true,
			'username' => 'root',
			'password' => '',
			'charset' => 'utf8',
            'tablePrefix' => 'tbl_'
		),

        'authManager' => array(
            'class'  => 'CDbAuthManager',
            'connectionID'     => 'db',
            'itemTable'          => 'AuthItem',
            'itemChildTable'    => 'AuthItemChild',
            'assignmentTable' => 'AuthAssignment',
            'defaultRoles'       =>  array('Guest'),
        ),

		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>'site/error',
		),
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
				),
				// uncomment the following to show log messages on web pages
				/*
				array(
					'class'=>'CWebLogRoute',
				),
				*/
			),
		),
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'geostashing@yandex.ru',
        'cryptSalt' => 'blablabla=3df43587f',
        'postsPerPage'=>10,
        'commentNeedApproval'=>true,
        'recentCommentCount'=>10,
        'searchSize' =>5,
        'minSearchStringLength' => 3,
	),
);