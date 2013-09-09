<?php
/**
 * This is the model class for table "wechat_record_presend".
 *
 * The followings are the available columns in table 'wechat_record_presend':
 * @property string $id
 * @property integer $userid
 * @property string $txt
 * @property string $dateline
 */
class WechatRecordPresend extends CActiveRecord
{

    /**
     * Returns the static model of the specified AR class.
     *
     * @param $className string
     *            active record class name.
     * @return WechatRecordPresend the static model class
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
        return 'wechat_record_presend';
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
                'userid', 
                'required'
            ), 
            array(
                'userid', 
                'numerical', 
                'integerOnly' => true
            ), 
            array('txt','length','max'=>200),
            array(
                'txt, dateline', 
                'safe'
            ), 
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array(
                'id, userid, txt, dateline', 
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
            'userid' => 'Userid', 
            'txt' => '自动回复内容', 
            'dateline' => 'Dateline'
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
        $criteria->compare('userid', $this->userid);
        $criteria->compare('txt', $this->txt, true);
        return new CActiveDataProvider($this, 
                array(
                    'criteria' => $criteria
                ));
    }

    /**
     * 系统默认的提示语句
     * 
     * @return Ambigous <unknown, Ambigous <CActiveRecord, NULL>, unknown>|NULL
     */
    public function getTxt ()
    {
        $criteria = new CDbCriteria();
        $criteria->order = "dateline desc";
        $criteria->limit = 1;
        $row = $this->find($criteria);
        if ($row) {
            return $row->txt;
        }
        return null;
    }
    
    public function beforeSave(){
        //$this-> txt = mysql_real_escape_string(strip_tags($this-> txt));
        return true;
    }
}