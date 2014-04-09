<?php

class UserController extends Controller
{
    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = '//layouts/column2';


    public function actions()
    {
        return array(
            'widget.'=> array(
                'class' => 'application.components.WidgetProvider'
            ),
            'update' => 'application.components.actions.UpdateUser',

            'saveImageAttachment' => 'application.extensions.imageAttachment.ImageAttachmentAction',

            // captcha action renders the CAPTCHA image displayed on the contact page
/*            'captcha'=>array(
                'class'=>'CCaptchaAction',
                'backColor'=>0xFFFFFF,
                'testLimit' => 1,
            ),*/
        );
    }


    /**
     * @return array action filters
     */
    public function filters()
    {
        return array(
            'accessControl', // perform access control for CRUD operations
            'postOnly + delete', // we only allow deletion via POST request
        );
    }

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function accessRules()
    {
        return array(

            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('index', 'view', 'widget.UpdateCity', 'widget.UpdateRegion','saveImageAttachment','registration'/*,'captcha'*/),
                'users' => array('*'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('update', 'widget.UpdateCity', 'widget.UpdateRegion'),
                'users' => array('admin'),
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('admin', 'delete','create'),
                'users' => array('admin'),
            ),
            array('deny',
                'actions' => array('registration'),
                'users' => array('@'),
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($id)
    {
        $this->render('view', array(
            'model' => $this->loadModel($id),
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate()
    {
        $model = new User('create');
        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['User'])) {
            $model->attributes = $_POST['User'];
            if ($model->save()) {
                $this->redirect(array('profile/index', 'id' => $model->id));
            }
        }

        $this->render('create', array(
            'model' => $model
        ));
    }

    public function saveMassage($sender_id,$addressee_id, $massage)
    {
        $model = new Massage();
        $model->user_sender_id = $sender_id;
        $model->user_addressee_id = $addressee_id;
        $model->massage = $massage;
        $model->date = time();
        $model->save();
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id)
    {
        $this->loadModel($id)->delete();

        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if (!isset($_GET['ajax'])) {
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
        }
    }

    /**
     * Lists all models.
     */
    public function actionIndex()
    {
        $dataProvider = new CActiveDataProvider('User');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin()
    {
        $model = new User('search');
        $model->unsetAttributes(); // clear any default values
        if (isset($_GET['User'])) {
            $model->attributes = $_GET['User'];
        }

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    public function actionRegistration()
    {
        $user = new User('registration');
        //$this->createAction('captcha')->getVerifyCode(true);
        /*
        * Ajax валидация
        */
        //$this->performAjaxValidation($user);

        if (isset($_POST['User'])) {
            $user->attributes = $_POST['User'];

            $user->activationKey = substr(md5(uniqid(rand(), true)), 0, rand(10, 15));
            $user->status = '0';

            if ($user->save()) {
                $role = new AuthAssignment();
                $role->itemname = 'User';
                $role->userid = $user->id;

                if ($role->save()) {
                    $sender = $user->findByAttributes(array('username' =>'admin'));
                    $addressee = $user->id;
                    $massage = 'Поздравляю! Вы стали участином игры. Ознакомится с правилами игры можно в разделе '.
                        CHtml::link(CHtml::encode('"Правила игры"'), Yii::app()->createUrl('site/rules'));
                    $this->saveMassage($sender->id,$addressee,$massage);

                    $this->redirect(Yii::app()->createUrl('profile/index'));
                    // $this->activationKey($user);
                }
            }
        }

        $this->render('registration', array('model' => $user));

    }

    /**
     * Отправление кода активации
     *
     * @param $model User
     * @return boolean
     */
    protected function activationKey($model) {
        $email = Yii::app()->email;

        $email->to = $model->e_mail;

        $email->subject = 'Код активации аккаунта для сайта '.Yii::app()->name;

        $email->message = 'Код активации аккаунта: <a href="'.Yii::app()->request->hostInfo.'/user/default/activation/key/'.$model->activationKey.'">'.$model->activationKey.'</a>';

        $email->send();
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return User the loaded model
     * @throws CHttpException
     */
    public function loadModel($id)
    {
        $model = User::model()->findByPk($id);
        if ($model === null) {
            throw new CHttpException(404, 'Запрашиваемой страницы не существует.');
        }
        return $model;
    }


    /**
     * Performs the AJAX validation.
     * @param User $model the model to be validated
     */
    protected function performAjaxValidation($model)
    {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'user-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }
}
