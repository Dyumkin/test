<?php

/**
 * This is the model class for table "AuthAssignment".
 *
 * The followings are the available columns in table 'AuthAssignment':
 * @property string $itemname
 * @property string $userid
 * @property string $bizrule
 * @property string $data
 */
class AuthAssignment extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
        return Yii::app()->authManager->assignmentTable;
	}

    public function getDbConnection() {
        return Yii::app()->authManager->db;
    }

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
            array('itemname','length','max'=>64),
            array('userid','length','max'=>64),
            array('itemname, userid', 'required'),
            array('user_id,itemname,bizrule,data','safe'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
            'authItems' => array(self::BELONGS_TO, 'AuthItem', 'name'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
            'itemname'=>Helper::translate('srbac','Itemname'),
            'userid'=>Helper::translate('srbac','User id'),
            'bizrule'=>Helper::translate('srbac','Bizrule'),
            'data'=>Helper::translate('srbac','Data'),
		);
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return AuthAssignment the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
