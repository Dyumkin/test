<?php

class ProfileController extends Controller
{

    public $layout = '//layouts/column2';

    public function actions()
    {
        return array(
            'update' => 'application.components.actions.UpdateUser',
        );
    }

    public function filters()
    {
        // return the filter configuration for this controller, e.g.:
        return array(
            'accessControl', // perform access control for CRUD operations
        );
    }

	public function actionIndex()
	{
        if(Yii::app()->user->isGuest){
            $this->redirect('site/login');
        }
        $id = Yii::app()->user->id;
        $this->render('index', array(
            'model' => $this->loadModel($id),
            'massage' => $this->loadMassage($id),
        ));
	}


    public function accessRules()
    {
        return array(

            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('index', 'view', 'update'),
                'users' => array('@'),
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }

    public function actionView()
    {
        $criteria = new CDbCriteria(array(
            'condition' => 'user_id=' . Yii::app()->user->id,
            'order' => 'update_date DESC',
        ));

        $dataProvider = new CActiveDataProvider('Stash', array(
            'pagination' => array(
                'pageSize' => Yii::app()->params['postsPerPage'],
            ),
            'criteria' => $criteria,
            'sort' => false,
        ));
        $this->render('view', array(
            'dataProvider' => $dataProvider,
        ));
    }

    public function loadModel($id)
    {
        $model = User::model()->findByPk($id);
        if ($model === null) {
            throw new CHttpException(404, 'The requested page does not exist.');
        }
        return $model;
    }

    public function loadMassage($addressee_id)
    {
        $model = Massage::model()->findAllByAttributes(array('user_addressee_id' => $addressee_id));
        if ($model === null) {
            throw new CHttpException(404, 'The requested page does not exist.');
        }
        return $model;
    }

}