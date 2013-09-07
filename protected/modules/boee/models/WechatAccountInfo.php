<?php

/**
 * This is the model class for table "wechat_account_info".
 *
 * The followings are the available columns in table 'wechat_account_info':
 * @property integer $id
 * @property string $name
 * @property string $memberid
 * @property string $membertype
 * @property string $belong
 * @property string $gender
 * @property string $idcard
 * @property string $located
 * @property string $datetime
 */
class WechatAccountInfo extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return WechatAccountInfo the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'wechat_account_info';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, memberid, membertype, belong, located', 'length', 'max'=>45),
			array('gender', 'length', 'max'=>3),
			array('idcard', 'length', 'max'=>255),
			array('datetime', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, memberid, membertype, belong, gender, idcard, located, datetime', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => '用户ID',
			'name' => '真实姓名',
			'memberid' => '会员卡号',
			'membertype' => '会员类型',
			'belong' => '公司',
			'gender' => '性别',
			'idcard' => '证件号',
			'located' => '所在地',
			'datetime' => '创建时间',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('memberid',$this->memberid,true);
		$criteria->compare('membertype',$this->membertype,true);
		$criteria->compare('belong',$this->belong,true);
		$criteria->compare('gender',$this->gender,true);
		$criteria->compare('idcard',$this->idcard,true);
		$criteria->compare('located',$this->located,true);
		$criteria->compare('datetime',$this->datetime,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}