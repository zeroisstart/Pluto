<?php
/**
 * This is the model class for table "wechat_account".
 *
 * The followings are the available columns in table 'wechat_account':
 * @property string $id
 * @property string $username
 * @property string $wechatid
 * @property string $password
 * @property string $realname
 */
class WechatAccount extends CActiveRecord
{

    public $vcert = '1';

    /**
     * Returns the static model of the specified AR class.
     *
     * @param $className string
     *            active record class name.
     * @return WechatAccount the static model class
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
        return 'wechat_account';
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
                'username, wechatid', 
                'length', 
                'max' => 25
            ), 
            array(
                'password', 
                'length', 
                'max' => 40
            ), 
            array(
                'realname', 
                'length', 
                'max' => 255
            ), 
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array(
                'id, username, wechatid, password, realname', 
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
            'username' => 'Username', 
            'wechatid' => 'Wechatid', 
            'password' => 'Password', 
            'idcard' => 'Idcard'
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
        $criteria->compare('username', $this->username, true);
        $criteria->compare('wechatid', $this->wechatid, true);
        $criteria->compare('password', $this->password, true);
        $criteria->compare('idcard', $this->idcard, true);
        return new CActiveDataProvider($this, 
                array(
                    'criteria' => $criteria
                ));
    }

    /**
     *
     * @param $wechatid string           
     * @param $memberID string           
     * @return boolean
     */
    public function bindByMemberID ($wechatid, $memberID)
    {
        $criteria = new CDbCriteria();
        $criteria->condition = "username='{$memberID}'";
        $criteria->limit = 1;
        $model = $this->find($criteria);
        if ($model) {
            $model->wechatid = $wechatid;
            return $model->update();
        }
        return false;
    }

    /**
     *
     * @param $wechatid string           
     * @param $idcard string           
     * @return boolean
     */
    public function bindIDCard ($wechatid, $idcard)
    {
        $criteria = new CDbCriteria();
        $criteria->condition = "idcard='{$idcard}'";
        $criteria->limit = 1;
        $model = $this->find($criteria);
        if ($model) {
            $model->wechatid = $wechatid;
            return $model->update();
        }
        return false;
    }

    /**
     * 检查是否绑定微信用户
     *
     * @param $wechatid string           
     * @return bool
     */
    public function isBind ($wechatid)
    {
        if ($this->getModelByWeChatID($wechatid)) {
            return true;
        }
        return false;
    }

    /**
     * 获取微信模型
     *
     * @param $wechatid string           
     * @return Ambigous <CActiveRecord, mixed, NULL, multitype:,
     *         multitype:unknown Ambigous <CActiveRecord, NULL> ,
     *         multitype:unknown >
     */
    public function getModelByWeChatID ($wechatid)
    {
        $criteria = new CDbCriteria();
        $criteria->condition = "wechatid='{$wechatid}'";
        $criteria->limit = 1;
        return $this->find($criteria);
    }
}