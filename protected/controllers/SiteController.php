<?php

class SiteController extends Controller
{

    public $layout = '//layouts/column2';

	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),

		);
	}

    public function filters()
    {
        return array(
            'accessControl', // perform access control for CRUD operations
            'postOnly + delete', // we only allow deletion via POST request
        );
    }

    public function accessRules()
    {
        return array(
            array('allow', // allow all users to perform 'index' and 'view' actions
                'actions' => array('index', 'history', 'advices','rules','contact','login','logout','page','error','captcha'),
                'users' => array('*'),
            ),

            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('migrate','update'),
                'users' => array('admin'),
            ),

            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }

    public function actionMigrate()
    {
        try{
            $commandPath = Yii::app()->getBasePath() . DIRECTORY_SEPARATOR . 'commands';
            $runner = new CConsoleCommandRunner();
            $runner->addCommands($commandPath);
            $commandPath = Yii::getFrameworkPath() . DIRECTORY_SEPARATOR . 'cli' . DIRECTORY_SEPARATOR . 'commands';
            $runner->addCommands($commandPath);
            $args = array('yiic', 'migrate', '--interactive=0');
            ob_start();
            $runner->run($args);
            echo htmlentities(ob_get_clean(), null, Yii::app()->charset);
        }catch(Exception $e){
            echo $e->getMessage();
        }
    }

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
        $stashCriteria = new CDbCriteria(array(
            'condition' => 'status=' . Stash::STATUS_APPROVED,
            'order' => 'create_date DESC',
            'limit' => 8,
        ));

        $data = Stash::model()->findAll($stashCriteria);

        $notepadCriteria = new CDbCriteria(array(
            'condition' => 'status=' . Notepad::STATUS_APPROVED,
            'order' => 'comment_date DESC',
            'limit' => 8,
        ));

        $notepad = Notepad::model()->findAll($notepadCriteria);

		$this->render('index', array(
        'data' => $data,
        'notepad' => $notepad,
    ));
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}

    public function actionHistory()
    {
        $history = $this->loadModel('history');
        $this->render('pages/history', array('model'=>$history));
    }

    public function actionRules()
    {
        $rules = $this->loadModel('rules');
        $this->render('pages/rules', array('model'=>$rules));
    }

    public function actionAdvices()
    {
        $advices = $this->loadModel('advices');
        $this->render('pages/advice', array('model'=>$advices));
    }

    public function actionUpdate($attribute)
    {
        $model = $this->loadModel($attribute);

        if (isset($_POST['SiteContent'])) {
            $model->attributes = $_POST['SiteContent'];
            if ($model->save()) {
                $this->redirect(array($attribute));
            }
        }

        $this->render('pages/update', array(
            'model' => $model,
        ));
    }

	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{
		$model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$name='=?UTF-8?B?'.base64_encode($model->name).'?=';
				$subject='=?UTF-8?B?'.base64_encode($model->subject).'?=';
				$headers="From: $name <{$model->email}>\r\n".
					"Reply-To: {$model->email}\r\n".
					"MIME-Version: 1.0\r\n".
					"Content-Type: text/plain; charset=UTF-8";

				mail(Yii::app()->params['adminEmail'],$subject,$model->body,$headers);
				Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model));
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		$model=new LoginForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo TbActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
				$this->redirect(Yii::app()->user->returnUrl);
		}
		// display the login form
		$this->render('login',array('model'=>$model));
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}

    public function loadModel($attribute)
    {
        $model = SiteContent::model()->findByAttributes(array('name' => $attribute));
        if ($model === null) {
            throw new CHttpException(404, 'Запрашиваемой страницы не существует.');
        }
        return $model;
    }
}