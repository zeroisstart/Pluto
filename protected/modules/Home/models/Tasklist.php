<?php

/**
 * This is the model class for table "{{tasklist}}".
 *
 * The followings are the available columns in table '{{tasklist}}':
 * @property integer $id
 * @property integer $uid
 * @property string $text
 * @property integer $hours
 * @property string $create_time
 * @property string $finish_time
 * @property string $status
 */
class Tasklist extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Tasklist the static model class
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
		return '{{tasklist}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('uid, hours', 'numerical', 'integerOnly'=>true),
			array('status', 'length', 'max'=>1),
			array('text, create_time, finish_time', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, uid, text, hours, create_time, finish_time, status', 'safe', 'on'=>'search'),
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
			'id' => 'ID',
			'uid' => 'Uid',
			'text' => 'Text',
			'hours' => 'Hours',
			'create_time' => 'Create Time',
			'finish_time' => 'Finish Time',
			'status' => 'Status',
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
		$criteria->compare('uid',$this->uid);
		$criteria->compare('text',$this->text,true);
		$criteria->compare('hours',$this->hours);
		$criteria->compare('create_time',$this->create_time,true);
		$criteria->compare('finish_time',$this->finish_time,true);
		$criteria->compare('status',$this->status,true);
		$criteria -> order ="create_time desc";

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}