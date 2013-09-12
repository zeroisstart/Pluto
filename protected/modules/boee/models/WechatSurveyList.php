<?php
/**
 * This is the model class for table "wechat_survey_list".
 *
 * The followings are the available columns in table 'wechat_survey_list':
 * @property integer $id
 * @property integer $userid
 * @property string $answer
 * @property string $disable
 * @property string $dateline
 * @property integer $level
 */
class WechatSurveyList extends CActiveRecord
{

    /**
     * Returns the static model of the specified AR class.
     *
     * @param $className string
     *            active record class name.
     * @return WechatSurveyList the static model class
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
        return 'wechat_survey_list';
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
                'userid, level', 
                'numerical', 
                'integerOnly' => true
            ),
            array(
                'answer', 
                'length', 
                'max' => 120
            ), 
            array(
                'disable', 
                'length', 
                'max' => 1
            ), 
            array(
                'dateline', 
                'safe'
            ), 
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array(
                'id, userid, answer, disable, dateline, level', 
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
            'userid' => '用户ID', 
            'wechatid'=>'微信ID',
            'answer' => '答案', 
            'disable' => '是否通过', 
            'dateline' => '答题时间', 
            'level' => '关卡'
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
        $criteria->compare('id', $this->id);
        $criteria->compare('userid', $this->userid);
        $criteria->compare('wechatid', $this->wechatid);
        $criteria->compare('answer', $this->answer, true);
        $criteria->compare('disable', $this->disable, true);
        $criteria->compare('dateline', $this->dateline, true);
        $criteria->compare('level', $this->level);
        return new CActiveDataProvider($this, 
                array(
                    'criteria' => $criteria
                ));
    }

    /**
     * 是否还能进行抽奖活动
     * 
     * @param $uid integer           
     * @return boolean number
     */
    public function canPlay ($uid,$fromuser=false)
    {
        
        $row = false;
        if(!$uid && $fromuser){
            $criteria = new CDbCriteria();
            $criteria -> condition ="wechatid='$fromuser'";
            $models = $this->findAll($criteria);
        }else{
            $WechatAppleList = WechatAppleList::model();
            $row = $WechatAppleList->findByAttributes(array(
                    'userid' => $uid
            ));
            
            if ($row) {
                Yii::app()->controller -> redirect(Yii::app()->createUrl('/boee/survey/getMyApple'));
                Yii::app()->end();
            }
            
            $criteria = new CDbCriteria();
            $criteria->condition = "userid = '{$uid}'";
            $criteria->order = "level asc";
            $models = $this->findAll($criteria);
        }
        
        if (empty($models)) {
            return true;
        }
        
        $level = 1;
        foreach ($models as $model) {
            if ($model->disable == '1') {
                return false;
            }
            $level = $model->level;
        }
        
        return $level;
        
    }
}