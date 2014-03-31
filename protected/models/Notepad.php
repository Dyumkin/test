<?php

/**
 * This is the model class for table "{{notepad}}".
 *
 * The followings are the available columns in table '{{notepad}}':
 * @property integer $id
 * @property string $comment
 * @property integer $comment_date
 * @property integer $user_id
 * @property integer $stash_id
 * @property integer $status
 *
 * The followings are the available model relations:
 * @property Stash $stash
 * @property User $user
 */
class Notepad extends CActiveRecord
{
    /**
     * @return string the associated database table name
     */
    const STATUS_PENDING = 1;
    const STATUS_APPROVED = 2;

    public function tableName()
    {
        return '{{notepad}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('comment', 'required'),
            array('user_id, stash_id', 'numerical', 'integerOnly' => true),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            //array('id, comment, comment_date, user_id, stash_id', 'safe', 'on'=>'search'),
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
            'stash' => array(self::BELONGS_TO, 'Stash', 'stash_id'),
            'user' => array(self::BELONGS_TO, 'User', 'user_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'id' => 'ID',
            'comment' => 'Запись',
            'comment_date' => 'Время записи',
            'user_id' => 'Игрок',
            'stash_id' => 'Тайник',
        );
    }

    public function approve()
    {
        $this->status = Notepad::STATUS_APPROVED;
        $this->update(array('status'));
    }

    /*
        public function getUrl($stash=null)
        {
            if($stash===null)
                $stash=$this->stash;
            return $stash->url.'#c'.$this->id;
        }
    */
    /**
     * @return string
     */
    public function getUserLink()
    {
        $pathToUserProfile = Yii::app()->createUrl('user/view', array('id' => $this->user_id));
        return CHtml::link(CHtml::encode($this->user->username), $pathToUserProfile);
    }

    public function findRecentComments($limit = 10)
    {
        return $this->with('stash')->findAll(array(
            'condition' => 't.status=' . self::STATUS_APPROVED,
            'order' => 't.comment_date DESC',
            'limit' => $limit,
        ));
    }

    /**
     * @return integer the number of comments that are pending approval
     */

    public function getPendingCommentCount()
    {
        return $this->count('status=' . self::STATUS_PENDING);
    }

    protected function beforeSave()
    {
        if (parent::beforeSave()) {
            if ($this->isNewRecord) {
                $this->comment_date = new CDbExpression('NOW()');
                $this->user_id = Yii::app()->user->id;
            }
            return true;
        } else
            return false;
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
    /*public function search()
    {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria=new CDbCriteria;

        $criteria->compare('id',$this->id);
        $criteria->compare('comment',$this->comment,true);
        $criteria->compare('comment_date',$this->comment_date,true);
        $criteria->compare('user_id',$this->user_id);
        $criteria->compare('stash_id',$this->stash_id);

        return new CActiveDataProvider($this, array(
            'criteria'=>$criteria,
        ));
    }
    */
    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Notepad the static model class
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }
}
