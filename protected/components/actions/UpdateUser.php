<?php
/**
 * Created by JetBrains PhpStorm.
 * User: y.dyumkin
 * Date: 28.11.13
 * Time: 13.24
 * To change this template use File | Settings | File Templates.
 */

class UpdateUser extends CAction
{
    /**
     * @param $id
     * @return CActiveRecord|User
     *
     * @throws CHttpException
     */
    public function loadModel($id)
    {
        if ($model = User::model()->findByPk($id)) {
            return $model;
        } else {
            throw new CHttpException(404, 'The requested page does not exist.');
        }
    }

    /**
     * @param int $id
     */
    public function run($id)
    {
        $model = $this->loadModel($id);
        $view = 'application.components.views.updateUser';

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['User'])) {
            $model->attributes = $_POST['User'];
            if ($model->save()) {
                $this->getController()->redirect(array('index'));
            }
        }

        $this->getController()->render($view, array(
            'model' => $model,
        ));
    }
}