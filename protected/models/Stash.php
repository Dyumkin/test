<?php

/**
 * This is the model class for table "{{stash}}".
 *
 * The followings are the available columns in table '{{stash}}':
 * @property integer $id
 * @property string $stash_name
 * @property string $type
 * @property string $class
 * @property string $attribute
 * @property string $season
 * @property integer $complexity
 * @property string $stash_description
 * @property string $place_description
 * @property string $other_information
 * @property string $content
 * @property string $answer
 * @property string $question
 * @property string $status
 * @property integer $user_id
 * @property string $create_date
 * @property string $update_date
 * @property integer $city_id
 * @property integer $latitude
 * @property integer $longitude
 * @property integer $gallery_id
 *
 * The followings are the available model relations:
 * @property User $user
 * @property Notepad[] $notepads
 * @property City $city
 * @property Visitor[] $visitors
 * @property Planing[] $planings
 */
class Stash extends CActiveRecord
{
    const STATUS_PENDING = 1;
    const STATUS_APPROVED = 2;

    const TYPE_TRADITIONAL = 'Традиционный';
    const TYPE_VIRTUAL = 'Виртуальный';
    const TYPE_STEPPED_TRADITIONAL = 'Пошаговый традиционный';
    const TYPE_STEPPED_VIRTUAL = 'Пошаговый виртуальный';

    const POINT_TRADITIONAL = 2;
    const POINT_VIRTUAL = 3;
    const POINT_STEPPED_TRADITIONAL = 4;
    const POINT_STEPPED_VIRTUAL = 5;

    const CLASS_ARCHAEOLOGICAL = 'Археологический';
    const CLASS_ARCHITECTURAL = 'Архитектурный';
    const CLASS_HISTORICAL = 'Исторический';
    const CLASS_LOGICAL = 'Логический';
    const CLASS_NATURAL = 'Природный';
    const CLASS_EXTREME = 'Экстремальный';

    const SEASON_WINTER = 'Не доступен зимой';
    const SEASON_ALL = 'Доступен круглый год';

    protected static $typesMap = array(
        self::TYPE_TRADITIONAL,
        self::TYPE_VIRTUAL,
        self::TYPE_STEPPED_TRADITIONAL,
        self::TYPE_STEPPED_VIRTUAL,
    );

    protected static $classesMap = array(
        self::CLASS_ARCHAEOLOGICAL,
        self::CLASS_ARCHITECTURAL,
        self::CLASS_HISTORICAL,
        self::CLASS_LOGICAL,
        self::CLASS_NATURAL,
        self::CLASS_EXTREME,
    );

    protected static $seasonsMap = array(
        self:: SEASON_ALL,
        self:: SEASON_WINTER,
    );

    public $stashPlace;

    public $alias ='stash';

    public $galleryAdded;

    public $createStashDate;

    public $_latitude;

    public $_longitude;

    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return '{{stash}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('stash_name, type, stash_description, place_description, content, answer, question, latitude, longitude', 'required'),
            array('stash_name', 'unique'),
            array('complexity, user_id, city_id, status, galleryAdded', 'numerical', 'integerOnly' => true),
            array('latitude, longitude', 'numerical'),
            array('stash_name, type', 'length', 'max' => 60),
            array('class', 'inArrayValidator', 'range' => array_keys($this->getClassOptions())),
            array('attribute, season', 'length', 'max' => 255),
            array('other_information, gallery_id', 'safe'),
            array('create_date', 'safe', 'on' => 'update'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('stash_name, type, class, attribute, season, complexity, stash_description, place_description, other_information, content, question, status', 'safe', 'on' => 'search'),
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
            'user' => array(self::BELONGS_TO, 'User', 'user_id'),
            'comments' => array(self::HAS_MANY, 'Notepad', 'stash_id', 'condition' => 'comments.status=' . Notepad::STATUS_APPROVED, 'order' => 'comments.comment_date DESC'),
            'commentCount' => array(self::STAT, 'Notepad', 'stash_id', 'condition' => 'status=' . Notepad::STATUS_APPROVED),
            'cities' => array(self::BELONGS_TO, 'City', 'city_id'),
            'visitors' => array(self::HAS_MANY, 'Visitor', 'stash_id'),
            'planings' => array(self::HAS_MANY, 'Planing', 'stash_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'stash_name' => 'Название тайника',
            'type' => 'Тип тайника',
            'class' => 'Класс тайника',
            'attribute' => 'Атрибуты тайника',
            'season' => 'Сезонность',
            'complexity' => 'Сложность',
            'stash_description' => 'Описание тайника',
            'place_description' => 'Описание месности',
            'other_information' => 'Другая информация',
            'content' => 'Содержимое тайника',
            'answer' => 'Ответ на контрольный вопрос',
            'question' => 'Контрольный вопрос',
            'status' => 'Статус',
            'user_id' => 'Игрок',
            'createStashDate' => 'Дата создания',
            'update_date' => 'Дата изменения',
            'stashPlace' => 'Ближайшая местность',
            'latitude' => 'Широта',
            'longitude' => 'Долгота',
            '_latitude' => 'Широта',
            '_longitude' => 'Долгота',
            'galleryAdded' => 'Я хочу добавить фотографии к тайнику',

        );
    }

    public function behaviors()
    {
        return array(
            'galleryBehavior' => array(
                'class' => 'GalleryBehavior',
                'imagePath' => 'gallery/'.$this->alias,
                'idAttribute' => 'gallery_id',
                'versions' => array(
                    'small' => array(
                        'centeredpreview' => array(200, 200), //array(98, 98),
                    ),
                    'medium' => array(
                        'resize' => array(800, null),
                    )
                ),
                'name' => true,
                'description' => true,
            )

        );

    }


    public function getUrl()
    {
        return Yii::app()->createUrl('stash/view', array(
            'id' => $this->id,
        ));
    }


    public function getMapUrl()
    {
        return Yii::app()->createUrl('stash/viewMap', array(
            'id' => $this->id,
        ));
    }
    /**
     * @param string $attribute
     * @param array $params
     */
    public function inArrayValidator($attribute, $params)
    {
        $allowedValues = $params['range'];
        $currentValues = $this->$attribute;
        if (!empty($currentValues)) {
            $wrongValues = array_diff($currentValues, array_intersect($currentValues, $allowedValues));

            if (!empty($wrongValues)) {
                $this->addError('class', implode(', ', $wrongValues));
            }
        }
    }

    /**
     * Adds a new comment to this post.
     * This method will set status and post_id of the comment accordingly.
     * @param Notepad $comment to be added
     * @return boolean whether the comment is saved successfully
     */

    public function addComment($comment)
    {
        if (Yii::app()->params['commentNeedApproval']) {
            $comment->status = Notepad::STATUS_PENDING;
        } else {
            $comment->status = Notepad::STATUS_APPROVED;
        }
        $comment->stash_id = $this->id;
        return $comment->save();
    }

    protected function serializeItems()
    {
        if (is_array($this->class)) {
            $this->class = implode(',', $this->class);
        }
    }

    protected function unserializeItems()
    {
        if (is_string($this->class)) {
            $this->class = explode(',', $this->class);
        }
    }

    protected function unserializeCoordinates()
    {
        $latitude = explode('.', $this->latitude);
        $longitude = explode('.', $this->longitude);

        $this->_latitude = html_entity_decode($latitude[0].'&deg; '.$latitude[1].'&prime;');
        $this->_longitude = html_entity_decode($longitude[0].'&deg; '.$longitude[1].'&prime;');
    }

    protected function beforeSave()
    {
        $this->serializeItems();

        if (parent::beforeSave()) {
            if ($this->isNewRecord) {
                $this->create_date = $this->update_date = time();
                $this->user_id = Yii::app()->user->id;
                $this->status = Stash::STATUS_PENDING;
            } else {
                $this->update_date = time();
            }
            return true;
        } else
            return false;
    }

    protected function afterDelete()
    {
        parent::afterDelete();
        Notepad::model()->deleteAll('stash_id=' . $this->id);
    }

    protected function afterFind() {
        $this->createStashDate = Yii::app()->dateFormatter->formatDateTime($this->create_date, 'long','');
        //$this->create_date = Yii::app()->dateFormatter->formatDateTime($this->create_date, 'long','');
        $this->update_date = Yii::app()->dateFormatter->formatDateTime($this->update_date, 'long','');
        $this->unserializeItems();
        $this->unserializeCoordinates();

        if (!empty($this->city_id)) {
            $this->stashPlace = City::model()->with('region', 'country')->findByPk($this->city_id);
            $this->stashPlace = $this->stashPlace->country->name . ' ' . $this->stashPlace->region->name . ' ' . $this->stashPlace->name;
        }

        parent::afterFind();
    }

    public function getTypeOptions(){
        return array_combine(self::$typesMap, self::$typesMap);
    }

    public function getClassOptions(){
        return array_combine(self::$classesMap, self::$classesMap);
    }

    public function getSeasonOptions(){
        return array_combine(self::$seasonsMap, self::$seasonsMap);
    }

    public function approve()
    {
        $this->status = Stash::STATUS_APPROVED;
        $this->update(array('status'));
    }

    public function getPendingStashCount()
    {
        return $this->count('status=' . self::STATUS_PENDING);
    }

    public function getStashLink()
    {
        $pathToStash = Yii::app()->createUrl('stash/view', array('id' => $this->id));
        return CHtml::link(CHtml::encode($this->stash_name), $pathToStash);
    }

    public function getVisitUser()
    {
       $users = Visitor::model()->findAll('stash_id=:stash_id', array(':stash_id' => $this->id));
        $visitor = array();
        foreach($users as $user){
           $visitor[$user['user_id']] = $user->user->username;
        }
        return $visitor;
    }

    public function getVisitCount()
    {
        return Visitor::model()->count('stash_id=:stash_id', array(':stash_id' => $this->id));
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


        $criteria->compare('stash_name', $this->stash_name, true);
        $criteria->compare('type', $this->type, true);
        $criteria->compare('create_date', $this->create_date, true);
        $criteria->compare('update_date', $this->update_date, true);
        $criteria->compare('attribute', $this->attribute, true);
        $criteria->compare('season', $this->season, true);
        $criteria->compare('complexity', $this->complexity);
        $criteria->compare('stash_description', $this->stash_description, true);
        $criteria->compare('place_description', $this->place_description, true);
        $criteria->compare('other_information', $this->other_information, true);
        $criteria->compare('content', $this->content, true);
        $criteria->compare('question', $this->question, true);
        $criteria->compare('status', $this->status);
        $criteria->compare('latitude', $this->latitude, true);
        $criteria->compare('longitude', $this->longitude, true);

        $sort = new CSort();
        $sort->defaultOrder = 'status ASC';

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
            'sort' => $sort,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Stash the static model class
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }
}
