<?php

/**
 * This is the model class for table "{{user}}".
 *
 * The followings are the available columns in table '{{user}}':
 * @property integer $id
 * @property string $username
 * @property string $password
 * @property string $e_mail
 * @property string $name
 * @property string $first_name
 * @property string $last_name
 * @property string $sex
 * @property string $birthday
 * @property string $phone
 * @property string $other_information
 * @property string $create_date
 */
class User extends CActiveRecord
{


    public $verifyPassword;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{user}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
                array('username, password, e_mail, verifyPassword', 'required'),
                array('username, name, first_name, last_name', 'length', 'max'=>60),
                array('username', 'unique'),
                array('e_mail', 'unique'),
                array('password, verifyPassword', 'required', 'on' => 'create'),
                array('password', 'safe', 'on' => 'update'),
                array('password, e_mail', 'length', 'max'=>32),
                array('verifyPassword', 'compare', 'compareAttribute' => 'password', 'message' => 'Retype Password is incorrect'),
                array('sex', 'length', 'max'=>7),
                array('phone', 'length', 'max'=>18),
                array('birthday, other_information', 'safe'),
                array('birthday','date', 'format' => 'yyyy-MM-dd'),
                // The following rule is used by search().
                // @todo Please remove those attributes that should not be searched.
                array('id, username, password, e_mail, name, first_name, last_name, sex, birthday, phone, other_information', 'safe', 'on'=>'search'),
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
            'stashes' => array(self::HAS_MANY, 'Stash', 'user_id'),
            'notepads' => array(self::HAS_MANY, 'Notepad', 'user_id'),
        );
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'username' => 'Username',
			'password' => 'Password',
			'e_mail' => 'E Mail',
			'name' => 'Name',
			'first_name' => 'First Name',
			'last_name' => 'Last Name',
			'sex' => 'Sex',
			'birthday' => 'Birthday',
			'phone' => 'Phone',
			'other_information' => 'Other Information',
			'create_date' => 'Create Date',
		);
	}

    protected function beforeSave()
    {
        if(parent::beforeSave())
        {
            if($this->isNewRecord)
            {
                $this->create_date = new CDbExpression('NOW()');
                //$this->password = $this->hashPassword($this->password);
                if (!empty($this->password) && ($this->password == $this->verifyPassword)) {
                    $this->password = crypt($this->password,Yii::app()->params['cryptSalt']);
                }

            }

            return true;
        }


        return false;
    }

    public function beforeValidate() {
        if (!parent::beforeValidate()) {
            return false;
        }

        if (!empty($this->birthday)) {
            $this->birthday = date('Y-m-d', strtotime($this->birthday));
        } else {
            $this->birthday = null;
        }

        return true;
    }

    public function findByUsername($username)
    {
        return $this->find(array(
            'condition' => 'username=:username',
            'params' => array(':username' => $username)
        ));
    }

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('username',$this->username,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('e_mail',$this->e_mail,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('first_name',$this->first_name,true);
		$criteria->compare('last_name',$this->last_name,true);
		$criteria->compare('sex',$this->sex,true);
		$criteria->compare('birthday',$this->birthday,true);
		$criteria->compare('phone',$this->phone,true);
		$criteria->compare('other_information',$this->other_information,true);
		$criteria->compare('create_date',$this->create_date,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return User the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
