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
 * @property integer $city_id
 * @property string $activationKey
 * @property string $status
 * The followings are the available model relations:
 * @property Notepad[] $notepads
 * @property Stash[] $stashes
 * @property City $city
 * @property Country $country
 * @property Visitor[] $visitors
 * @property Massage[] $massages_addressee
 * @property Massage[] $massages_sender
 * @property Planing[] $planings
 */
class User extends CActiveRecord
{

    const SEX_MALE = 'Мужской';
    const SEX_FEMALE = 'Женский';

    protected static $genderMap = array(
        self::SEX_MALE,
        self::SEX_FEMALE,

    );


    public $verifyPassword;

    public $userPlace;

    public $avaImg;

    //public $verifyCode;

    public $_birthday;

    public $createStashCount;

    public $foundStashCount;

    public $points = 0;

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
            array('username, password, e_mail, verifyPassword', 'required','on'=>'create, registration'),
            //array('verifyCode', 'required', 'on'=>'create, registration'),
            array('username, name, first_name, last_name', 'length', 'max' => 60),
            array('username, e_mail', 'unique'),
            array('password, verifyPassword, birthday', 'safe', 'on' => 'update'),
            array('password, e_mail', 'length', 'max' => 32),
            array('verifyPassword', 'compare', 'compareAttribute' => 'password', 'message' => 'Retype Password is incorrect','on'=>'create, registration'),
            array('sex', 'length', 'max' => 7),
            array('phone', 'length', 'max' => 18),
            array('birthday, other_information', 'safe'),
           // array('birthday', 'date', 'format'=>'dd.mm.yyyy'),
            array('city_id' , 'numerical', 'integerOnly'=>true),
            array('avaImg', 'file', 'types' => 'png, gif, jpg', 'allowEmpty' => true),
            //array('verifyCode', 'captcha', 'allowEmpty'=>!CCaptcha::checkRequirements()),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, username, password, e_mail, name, first_name, last_name, sex, birthday, phone, other_information', 'safe', 'on' => 'search'),
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
            'massages_addressee' => array(self::HAS_MANY, 'Massage', 'user_addressee_id'),
            'massages_sender' => array(self::HAS_MANY, 'Massage', 'user_sender_id'),
            'stashes' => array(self::HAS_MANY, 'Stash', 'user_id'),
            'notepads' => array(self::HAS_MANY, 'Notepad', 'user_id'),
            'cities' => array(self::BELONGS_TO, 'City', 'city_id'),
            'planings' => array(self::HAS_MANY, 'Planing', 'user_id'),
            'visitors' => array(self::HAS_MANY, 'Visitor', 'user_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'username' => 'Псевдоним',
            'password' => 'Пароль',
            'verifyPassword' => 'Повторите пароль',
            'e_mail' => 'E Mail',
            'name' => 'Имя',
            'first_name' => 'Фамилия',
            'last_name' => 'Отчество',
            'sex' => 'Пол',
            'birthday' => 'Дата рождения',
            '_birthday' => 'Дата рождения',
            'phone' => 'Телефон',
            'other_information' => 'Другая информация',
            'create_date' => 'Дата регистрации',
            'city_id' => 'Город',
            'verifyCode'   => 'Код подтверждения',
            'createStashCount' => 'Количество созданый тайников',
            'foundStashCount' => 'Количество найденых тайников',
            'points' => 'Баллы',
        );
    }

    protected function beforeSave()
    {
        if (parent::beforeSave()) {
            if ($this->isNewRecord) {
                $this->create_date = new CDbExpression('NOW()');
                $this->password = crypt($this->password, Yii::app()->params['cryptSalt']);
            }

/*            if(!empty($this->birthday)){
                $this->birthday = Yii::app()->dateFormatter->('yyyy-mm-dd', $this->birthday);
            }*/
            return true;
        }


        return false;
    }

    public function behaviors()
    {
        return array(
            'preview' => array(
                'class' => 'ext.imageAttachment.ImageAttachmentBehavior',
                // size for image preview in widget
                'previewHeight' => 200,
                'previewWidth' => 300,
                // extension for image saving, can be also tiff, png or gif
                'extension' => 'jpg',
                // folder to store images
                'directory' => Yii::getPathOfAlias('webroot').'/images/avatar',
                // url for images folder
                'url' => Yii::app()->request->baseUrl . '/images/avatar',
                // image versions
                'versions' => array(
                    'small' => array(
                        'resize' => array(200, null),
                    ),
                    'medium' => array(
                        'resize' => array(800, null),
                    )
                )
            )
        );
    }

    public function findByUsername($username)
    {
        return $this->find(array(
            'condition' => 'username=:username',
            'params' => array(':username' => $username)
        ));
    }

    public function getUrl()
    {
        return Yii::app()->createUrl('user/view', array(
            'id' => $this->id,
        ));
    }

    public function getGenderOptions(){
        return array_combine(self::$genderMap, self::$genderMap);
    }

    protected function getCreateStashCount(){
        $this->createStashCount = Stash::model()->count('user_id=:user_id AND status='.Stash::STATUS_APPROVED,array(':user_id' => $this->id));
    }

    protected function getFoundStashCount(){
        $this->foundStashCount = Visitor::model()->count('user_id=:user_id',array(':user_id' => $this->id));
    }

    protected function countPoints()
    {
        $visit = new Visitor();

        $rows = $visit->findAll('user_id=:user_id', array(':user_id' => $this->id));
        $count = 0;
        foreach ($rows as $stashes) {
            if ($stashes->stash->type == Stash::TYPE_STEPPED_VIRTUAL) {
                $count = $stashes->stash->complexity + Stash::POINT_STEPPED_VIRTUAL;
            }
            if ($stashes->stash->type == Stash::TYPE_STEPPED_TRADITIONAL) {
                $count = $stashes->stash->complexity + Stash::POINT_STEPPED_TRADITIONAL;
            }
            if ($stashes->stash->type == Stash::TYPE_VIRTUAL) {
                $count = $stashes->stash->complexity + Stash::POINT_VIRTUAL;
            }
            if ($stashes->stash->type == Stash::TYPE_TRADITIONAL) {
                $count = $stashes->stash->complexity + Stash::POINT_TRADITIONAL;
            }

            $this->points = $this->points + $count;
        }

    }

    protected function afterFind()
    {
        //$this->birthday = Yii::app()->dateFormatter->format('dd.MM.yyyy', $this->birthday);
        //$this->_birthday = Yii::app()->dateFormatter->formatDateTime($this->birthday, 'long', '');
        $this->getCreateStashCount();
        $this->getFoundStashCount();
        $this->countPoints();

        if (!empty($this->city_id)) {
            $this->userPlace = City::model()->with('region', 'country')->findByPk($this->city_id);
            $this->userPlace = $this->userPlace->country->name . ' ' . $this->userPlace->region->name . ' ' . $this->userPlace->name;
        }

        parent::afterFind();
    }

    protected function afterDelete()
    {
        parent::afterDelete();
        Massage::model()->deleteAll('user_addressee_id=' . $this->id);
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

        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('username', $this->username, true);
        $criteria->compare('e_mail', $this->e_mail, true);
        $criteria->compare('name', $this->name, true);
        $criteria->compare('first_name', $this->first_name, true);
        $criteria->compare('last_name', $this->last_name, true);
        $criteria->compare('sex', $this->sex, true);
        $criteria->compare('birthday', $this->birthday, true);
        $criteria->compare('phone', $this->phone, true);
        $criteria->compare('other_information', $this->other_information, true);
        $criteria->compare('create_date', $this->create_date, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return User the static model class
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }
}
