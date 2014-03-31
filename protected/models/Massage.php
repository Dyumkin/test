<?php

/**
 * This is the model class for table "{{massage}}".
 *
 * The followings are the available columns in table '{{massage}}':
 * @property integer $id
 * @property integer $user_sender_id
 * @property integer $user_addressee_id
 * @property string $massage
 * @property integer $date
 *
 * The followings are the available model relations:
 * @property User $userAddressee
 * @property User $userSender
 */
class Massage extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{massage}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user_sender_id, user_addressee_id, massage, date', 'required'),
			array('user_sender_id, user_addressee_id, date', 'numerical', 'integerOnly'=>true),
			array('massage', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, user_sender_id, user_addressee_id, massage, date', 'safe', 'on'=>'search'),
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
			'userAddressee' => array(self::BELONGS_TO, 'User', 'user_addressee_id'),
			'userSender' => array(self::BELONGS_TO, 'User', 'user_sender_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'user_sender_id' => 'Отправитель',
			'user_addressee_id' => 'Адресат',
			'massage' => 'Сообщение',
			'date' => 'Дата',
		);
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
		$criteria->compare('user_sender_id',$this->user_sender_id);
		$criteria->compare('user_addressee_id',$this->user_addressee_id);
		$criteria->compare('massage',$this->massage,true);
		$criteria->compare('date',$this->date);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Massage the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
