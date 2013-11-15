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
 * @property string $set_date
 * @property integer $complexity
 * @property string $stash_description
 * @property string $place_description
 * @property string $other_information
 * @property string $content
 * @property string $answer
 * @property string $question
 * @property integer $status
 * @property integer $user_id
 * @property string $create_date
 * @property string $update_date
 *
 *
 * The followings are the available model relations:
 * @property User $user
 */
class Stash extends CActiveRecord
{
    /**
     * @return string the associated database table name
     */
    const STATUS_PUBLISHED = true;
    const STATUS_UNPUBLISHED = false;

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
            array('stash_name, type, set_date, stash_description, place_description, content, answer, question', 'required'),
            array('complexity, status, user_id', 'numerical', 'integerOnly' => true),
            array('stash_name, type', 'length', 'max' => 60),
            array('class', 'length', 'max' => 32),
            array('attribute, season', 'length', 'max' => 255),
            array('other_information', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('stash_name, type, class, attribute, season, set_date, complexity, stash_description, place_description, other_information, content, question, status', 'safe', 'on' => 'search'),
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
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'stash_name' => 'Stash Name',
            'type' => 'Type',
            'class' => 'Class',
            'attribute' => 'Attribute',
            'season' => 'Season',
            'set_date' => 'Set Date',
            'complexity' => 'Complexity',
            'stash_description' => 'Stash Description',
            'place_description' => 'Place Description',
            'other_information' => 'Other Information',
            'content' => 'Content',
            'answer' => 'Answer',
            'question' => 'Question',
            'status' => 'Status',
            'user_id' => 'User',
            'create_date' => 'Create Date',
            'update_date' => 'Update Date',
        );
    }


    public function getUrl()
    {
        return Yii::app()->createUrl('stash/view', array(
            'id' => $this->id,
            'stash_name' => $this->stash_name,
        ));
    }



    /**
     * Adds a new comment to this post.
     * This method will set status and post_id of the comment accordingly.
     * @param Notepad $comment to be added
     * @return boolean whether the comment is saved successfully
     */

    public function addComment($comment)
    {
        if (Yii::app()->params['commentNeedApproval'])
            $comment->status = Notepad::STATUS_PENDING;
        else
            $comment->status = Notepad::STATUS_APPROVED;
        $comment->stash_id = $this->id;
        return $comment->save();
    }


    protected function beforeSave()
    {
        if (parent::beforeSave()) {
            if ($this->isNewRecord) {
                $this->create_date = $this->update_date = time();
                $this->user_id = Yii::app()->user->id;
                $this->status = true;
            } else
                $this->update_date = time();
            return true;
        } else
            return false;
    }

    protected function afterDelete()
    {
        parent::afterDelete();
        Notepad::model()->deleteAll('stash_id=' . $this->id);
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
        $criteria->compare('class', $this->class, true);
        $criteria->compare('attribute', $this->attribute, true);
        $criteria->compare('season', $this->season, true);
        $criteria->compare('set_date', $this->set_date, true);
        $criteria->compare('complexity', $this->complexity);
        $criteria->compare('stash_description', $this->stash_description, true);
        $criteria->compare('place_description', $this->place_description, true);
        $criteria->compare('other_information', $this->other_information, true);
        $criteria->compare('content', $this->content, true);
        $criteria->compare('question', $this->question, true);
        $criteria->compare('status', $this->status);


        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
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
