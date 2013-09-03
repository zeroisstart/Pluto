<?php
/**
 * This is the model class for table "wechat_auto_reply".
 *
 * The followings are the available columns in table 'wechat_auto_reply':
 * @property string $id
 * @property string $keyword
 * @property string $txt
 * @property string $dateline
 * @property string $disable
 */
class WechatAutoReply extends CActiveRecord
{

    /**
     * Returns the static model of the specified AR class.
     *
     * @param $className string
     *            active record class name.
     * @return WechatAutoReply the static model class
     */
    public static function model ($className = __CLASS__)
    {
        return parent::model($className);
    }

    /**
     *
     * @return string the associated database table name
     */
    public function tableName ()
    {
        return 'wechat_auto_reply';
    }

    /**
     *
     * @return array validation rules for model attributes.
     */
    public function rules ()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array(
                'keyword', 
                'length', 
                'max' => 255
            ), 
            array(
                'disable', 
                'length', 
                'max' => 1
            ), 
            array(
                'txt, dateline', 
                'safe'
            ), 
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array(
                'id, keyword, txt, dateline, disable', 
                'safe', 
                'on' => 'search'
            )
        );
    }

    /**
     *
     * @return array relational rules.
     */
    public function relations ()
    {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array();
    }

    /**
     *
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels ()
    {
        return array(
            'id' => 'ID', 
            'keyword' => 'Keyword', 
            'txt' => 'Txt', 
            'dateline' => 'Dateline', 
            'disable' => 'Disable'
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     *
     * @return CActiveDataProvider the data provider that can return the models
     *         based on the search/filter conditions.
     */
    public function search ()
    {
        // Warning: Please modify the following code to remove attributes that
        // should not be searched.
        $criteria = new CDbCriteria();
        $criteria->compare('id', $this->id, true);
        $criteria->compare('keyword', $this->keyword, true);
        $criteria->compare('txt', $this->txt, true);
        $criteria->compare('dateline', $this->dateline, true);
        $criteria->compare('disable', $this->disable, true);
        return new CActiveDataProvider($this, 
                array(
                    'criteria' => $criteria
                ));
    }

    public function findReplyByKeyword ($keyword)
    {
        $criteria = new CDbCriteria();
        $criteria->condition = "keyword ='{$keyword}'";
        $criteria->limit = 1;
        $row = $this->find($criteria);
        if ($row)
            return $row->txt;
        return NULL;
    }
}