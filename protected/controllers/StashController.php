<?php

class StashController extends Controller
{
    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = '//layouts/column2';

    /**
     * @var CActiveRecord the currently loaded data model instance.
     */
    private $_model;

    public $coordinates = array();
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
            array('allow', // allow all users to perform 'index' and 'view' actions
                'actions' => array('index', 'view', 'viewMap', 'search'),
                'users' => array('*'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions'=>array('create','update','newComment','gallery','answerTheQuestion', 'routePlanning'),
                'users' => array('@'),
            ),

			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete','approve'),
				'users'=>array('admin'),
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
        $stash = $this->loadModel($id);
        $notepad = $this->newComment($stash);

        $this->render('view', array(
            'model' => $stash,
            'notepad' => $notepad,
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate()
    {
        $model = new Stash;
        $model->season = Stash::SEASON_ALL;
        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Stash'])) {
            $model->attributes = $_POST['Stash'];

            if ($model->save()) {
                $sender = User::model()->findByAttributes(array('username' =>'admin'));
                $addressee_id = Yii::app()->user->id;
                $massage = 'Спасибо за создание тайника "'.$model->getStashLink().'" Ваш тайник будет размещена, как только он будет одобрен администратором.';
                $this->saveMassage($sender->id,$addressee_id,$massage);
                if($model->galleryAdded == 1)
                {
                    $this->redirect(array('gallery', 'id' => $model->id));
                } else{
                $this->redirect(array('view', 'id' => $model->id));
                }
            }
        }

        $this->render('create', array(
            'model' => $model,
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

    protected function visitStash($userId, $stashId)
    {
        $model = new Visitor();
        if (!$model->exists('user_id=' . $userId . ' AND stash_id=' . $stashId)) {
        $model->user_id = $userId;
        $model->stash_id = $stashId;
        $model->date = time();
        $model->save();
            return true;
        }else{
            return false;
        }
    }


    public function actionAnswerTheQuestion($id,$answer)
    {
        if (Yii::app()->request->isAjaxRequest) {
            if(!empty($answer) && !empty($id))
            {
                $model = $this->loadModel($id);
                if($model->answer == $answer){
                    $sender = User::model()->findByAttributes(array('username' =>'admin'));
                    $addressee_id = Yii::app()->user->id;
                    $massage = 'Тайник "'.$model->getStashLink().'" засчитан как посещённый.';

                    if($this->visitStash(Yii::app()->user->id, $model->id)){
                    $this->saveMassage($sender->id,$addressee_id,$massage);
                        echo "Поздравляем! Ваш ответ правильный!";
                    }else {
                        echo 'Ваш ответ уже был засчитан';
                    }

                }else{
                    echo "Вы дали неверный ответ. Пожалуйста попробуйте снова, возможно вы что-то упустили";
                }
            }else{
                throw new CHttpException(400, 'Неверный запрос. Пожалуйста, не повторяйте этот запрос снова.');
            }
        }else
        {
            throw new CHttpException(400, 'Неверный запрос. Пожалуйста, не повторяйте этот запрос снова.');
        }
    }

    public function actionRoutePlanning($id)
    {
        if (Yii::app()->request->isAjaxRequest) {
            $model = $this->loadModel($id);
            if($this->planingStash($model->id)){
                echo 'Тайник добавлен в запланированные маршруты';
            }else{
                echo 'Тайник уже был добавлен';
            }
        }else{
            throw new CHttpException(400, 'Неверный запрос. Пожалуйста, не повторяйте этот запрос снова.');
        }
    }

    protected function planingStash($stash_id)
    {
        $model = new Planing();
        $user = Yii::app()->user->id;
        if (!$model->exists('user_id=' . $user . ' AND stash_id=' . $stash_id)) {
            $model->stash_id = $stash_id;
            $model->user_id = $user;
            $model->date = time();
            $model->save();

            return true;
        }else{
            return false;
        }
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */

    public function actionUpdate($id)
    {
        $model = $this->loadModel($id);
        if(Yii::app()->user->id == $model->user_id || Yii::app()->user->name == 'admin'){
        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Stash'])) {
            $model->attributes = $_POST['Stash'];
            if ($model->save()) {
                $this->redirect(array('view', 'id' => $model->id));
            }
        }

        $this->render('update', array(
            'model' => $model,
        ));
        } else {
            throw new CHttpException(403,'У вас недостаточно прав для выполнения указанного действия.');
        }
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
        $criteria = new CDbCriteria(array(
            'condition' => 'status=' . Stash::STATUS_APPROVED,
            'order' => 'update_date DESC',
            'with' => 'commentCount',
        ));

        $dataProvider = new CActiveDataProvider('Stash', array(
            'pagination' => array(
                'pageSize' => Yii::app()->params['postsPerPage'],
            ),
            'criteria' => $criteria,
        ));
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin()
    {
        $model = new Stash('search');
        $model->unsetAttributes(); // clear any default values
        if (isset($_GET['Stash'])) {
            $model->attributes = $_GET['Stash'];
        }

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    public function actionApprove()
    {
        if (Yii::app()->request->isPostRequest) {
            $model = $this->loadModel();
            $model->approve();
            $sender = User::model()->findByAttributes(array('username' =>'admin'));
            $massage = 'Ваш тайник "'.$model->getStashLink().'" был утверждён администратором';
            $this->saveMassage($sender->id,$model->user_id,$massage);
            $this->redirect(array('admin'));
        } else {
            throw new CHttpException(400, 'Неверный запрос. Пожалуйста, не повторяйте этот запрос снова.');
        }
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @throws CHttpException
     * @internal param int $id the ID of the model to be loaded
     * @return Stash the loaded model
     */

    public function loadModel()
    {
        if ($this->_model === null) {
            if (isset($_GET['id'])) {
                if (Yii::app()->user->isGuest) {
                    $condition = 'status=' . Stash::STATUS_APPROVED . ' OR status=' . Stash::STATUS_PENDING;
                } else {
                    $condition = '';
                }
                $this->_model = Stash::model()->findByPk($_GET['id'], $condition);
            }
            if ($this->_model === null) {
                throw new CHttpException(404, 'Запрашиваемой страницы не существует.');
            }
        }
        return $this->_model;
    }

    public function actionGallery($id)
    {
        $model = $this->loadModel($id);

        $this->render('gallery', array(
            'model' => $model,
        ));
    }

    /**
     * Creates a new comment.
     * This method attempts to create a new comment based on the user input.
     * If the comment is successfully created, the browser will be redirected
     * to show the created comment.
     * @param Stash $stash that the new comment belongs to
     * @return Notepad the comment instance
     */
    protected function newComment($stash)
    {
        $comment = new Notepad;
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'notepad-form') {
            echo CActiveForm::validate($comment);
            Yii::app()->end();
        }
        if (isset($_POST['Notepad'])) {
            {
                $comment->attributes = $_POST['Notepad'];
            }
            if ($stash->addComment($comment)) {
                if ($comment->status == Notepad::STATUS_PENDING) {
                    Yii::app()->user->setFlash('commentSubmitted', 'Спасибо за вашу запись. Ваша запись будет размещена после её утверждения администратором.');
                }
                $this->refresh();
            }
        }
        return $comment;
    }

    public function actionViewMap()
    {

        $model = new Stash;

        if (isset($_GET['id'])){
            if($coordinate = $model->findByPk($_GET['id'])){
            $this->coordinates = array(
                'latitude' => $coordinate->latitude,
                'longitude' => $coordinate->longitude,
            );
            }else{
                throw new CHttpException(404, 'Запрашиваемой страницы не существует.');
            }

        }

        $this->render('viewMap', array(
            'model' => $model,
        ));
    }

    /**
     * Performs the AJAX validation.
     * @param Stash $model the model to be validated
     */
    protected function performAjaxValidation($model)
    {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'stash-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

    public function  snippet($text, $maxchar=400, $allowTags=false, $onlyText=false){

        ($allowTags===false) ? $allowTags = '<p><br>' :    $allowTags = $allowTags.'<p><br>';
        ($onlyText===false) ? $text = strip_tags($text, $allowTags) : $text = strip_tags($text);

        if(iconv_strlen($text, 'utf-8') > $maxchar ){
            $text = iconv_substr($text, 0, $maxchar, 'utf-8' );
            $text = preg_replace('@(.*)\s[^\s]*$@s', '\\1...', $text);
        }
        $text = trim($text);

        return $text;
    }

    public function actionSearch()
    {
        $search = new SiteSearchForm;

        if(isset($_POST['SiteSearchForm'])) {
            $search->attributes = $_POST['SiteSearchForm'];
            $_GET['searchString'] = $search->string;
        } else {
            $search->string = $_GET['searchString'];
        }

        $criteria = new CDbCriteria(array(
            'condition' => 'status='.Stash::STATUS_APPROVED.' AND place_description LIKE :keyword',
            'order' => 'create_date DESC',
            'params' => array(
                ':keyword' => '%'.$search->string.'%',
            ),
        ));

        $materialCount = Stash::model()->count($criteria);
        $pages = new CPagination($materialCount);
        $pages->pageSize = Yii::app()->params['searchSize'];
        $pages->applyLimit($criteria);

        $materials = Stash::model()->findAll($criteria);

        $this->render('found',array(
            'materials' => $materials,
            'pages' => $pages,
            'search' => $search,
        ));

    }
}
