<?php

class NotepadController extends Controller
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

    /**
     * @return array action filters
     */
    public function filters()
    {
        return array(
            'accessControl', // perform access control for CRUD operations
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
                'actions' => array('approve'),
                'users' => array('admin'),
            ),
            array('allow', // allow all users to perform 'index' and 'view' actions
                'actions' => array('index','update','delete'),
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
    /*
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}
    */
    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    /*
	public function actionCreate()
	{
		$model=new Notepad;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Notepad']))
		{
			$model->attributes=$_POST['Notepad'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}
*/
    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id)
    {
        $model = $this->loadModel($id);

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'notepad-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }

        if (isset($_POST['Notepad'])) {
            $model->attributes = $_POST['Notepad'];
            if ($model->save()) {
                $this->redirect(array('index'));
            }
        }

        $this->render('update', array(
            'model' => $model,
        ));
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
            $this->redirect(array('index'));
        }
    }

    /**
     * Lists all models.
     */
    public function actionIndex()
    {
        $dataProvider = new CActiveDataProvider('Notepad', array(
            'criteria' => array(
                'with' => 'stash',
                'order' => 't.status, t.comment_date DESC',
            ),
        ));
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    /*
	public function actionAdmin()
	{
		$model=new Notepad('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Notepad']))
			$model->attributes=$_GET['Notepad'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}
    */

    /**
     * Approves a particular comment.
     * If approval is successful, the browser will be redirected to the comment index page.
     */
    public function actionApprove()
    {
        if (Yii::app()->request->isPostRequest) {
            $comment = $this->loadModel();
            $comment->approve();
            $this->redirect(array('index'));
        } else {
            throw new CHttpException(400, 'Неверный запрос. Пожалуйста, не повторяйте этот запрос снова.');
        }
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @throws CHttpException
     * @internal param int $id the ID of the model to be loaded
     * @return Notepad the loaded model
     */

    public function loadModel()
    {
        if ($this->_model === null) {
            if (isset($_GET['id'])) {
                $this->_model = Notepad::model()->findbyPk($_GET['id']);
            }
            if ($this->_model === null) {
                throw new CHttpException(404, 'Запрашиваемой страницы не существует.');
            }
        }
        return $this->_model;
    }

    /**
     * Performs the AJAX validation.
     * @param Notepad $model the model to be validated
     */
    /*
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='notepad-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
    */
}
