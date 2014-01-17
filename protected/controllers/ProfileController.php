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

	public function actionIndex()
	{
        $id = Yii::app()->user->id;
        $this->render('index', array(
            'model' => $this->loadModel($id),
        ));
	}

	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
        return array(
            'accessControl', // perform access control for CRUD operations
        );
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


}