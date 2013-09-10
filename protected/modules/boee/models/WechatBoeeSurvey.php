<?php
/**
 * This is the model class for table "wechat_boee_survey".
 *
 * The followings are the available columns in table 'wechat_boee_survey':
 * @property integer $id
 * @property string $title
 * @property string $options
 * @property string $answer
 */
class WechatBoeeSurvey extends CActiveRecord
{

    /**
     * Returns the static model of the specified AR class.
     *
     * @param $className string
     *            active record class name.
     * @return WechatBoeeSurvey the static model class
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
        return 'wechat_boee_survey';
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
                'title, options', 
                'length', 
                'max' => 255
            ), 
            array(
                'answer', 
                'length', 
                'max' => 2
            ), 
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array(
                'id, title, options, answer', 
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
            'title' => 'Title', 
            'options' => 'Options', 
            'answer' => 'Answer'
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
        $criteria->compare('title', $this->title, true);
        $criteria->compare('options', $this->options, true);
        $criteria->compare('answer', $this->answer, true);
        return new CActiveDataProvider($this, 
                array(
                    'criteria' => $criteria
                ));
    }

    public function getOptions ()
    {
        $options = $this->options;
        $options = (explode('</o><o>', $options));
        $retuen_res = array();
        foreach ($options as $key => $val) {
            $val = str_replace('<o>', '', $val);
            $val = str_replace('</o>', '', $val);
            $retuen_res[] = array(
                'val' => $val[0], 
                'title' => $val
            );
        }
        return $retuen_res;
    }

    /**
     *
     * @param $num integer           
     */
    public function pass ($step, $answer, $userid)
    {
        $req = Yii::app()->request;
        $WechatSurveyList = new WechatSurveyList();
        $WechatSurveyList->dateline = date('Y-m-d H:i:s', time());
        $WechatSurveyList->userid = $userid;
        $WechatSurveyList->level = $step;
        $WechatSurveyList->disable = 0;
        $WechatSurveyList->answer = json_encode($answer);
        $WechatSurveyList->save();
    }

    /**
     *
     * @param $step integer           
     */
    public function failed ($step, $answer, $userid)
    {
        $WechatSurveyList = new WechatSurveyList();
        $WechatSurveyList->dateline = date('Y-m-d H:i:s', time());
        $WechatSurveyList->userid = $userid;
        $WechatSurveyList->level = $step;
        $WechatSurveyList->answer = json_encode($answer);
        $WechatSurveyList->disable = 1;
        $WechatSurveyList->save();
        $WechatSurveyList->updateAll(array(
            'disable' => 1
        ), "userid = '{$userid}'");
    }

    /**
     * 返回 ID所示的问题
     *
     * @param $ary_id array           
     * @return Ambigous <multitype:, mixed, CActiveRecord, NULL,
     *         multitype:unknown Ambigous <CActiveRecord, NULL> ,
     *         multitype:unknown >
     */
    public function getProblemByIDS (array $ary_id)
    {
        $ids = implode(',', $ary_id);
        $criteria = new CDbCriteria();
        $criteria->condition = " id in ($ids)";
        return $this->findAll($criteria);
    }

    /**
     * 获取随机问题
     *
     * @param $num integer           
     * @return array
     */
    public function getRandQuestion ($num, array $not_show_again = array())
    {
        $criteria = new CDbCriteria();
        $criteria->order = ' rand() ';
        $criteria->limit = $num;
        if ($not_show_again) {
            $not_show_again = implode(',', $not_show_again);
            $criteria->condition = " id NOT IN ($not_show_again)";
        }
        return $this->findAll($criteria);
    }

    /**
     *
     * @param $uid integer           
     */
    public function getQuestionids ($uid)
    {
        $model = WechatSurveyList::model();
        $criteria = new CDbCriteria();
        $criteria->condition = " userid = '{$uid}'";
        $rows = $model->findAll($criteria);
        $ids = array();
        foreach ($rows as $model) {
            $answer = json_decode($model->answer);
            foreach ($answer as $key => $val) {
                $ids[] = $key;
            }
        }
        return $ids;
    }
}