<?php

/**
 * This is the model class for table "sitelink".
 *
 * The followings are the available columns in table 'sitelink':
 * @property integer $id
 * @property integer $cate
 * @property string $title
 * @property string $url
 * @property string $visable
 * @property string $create_time
 */
class Sitelink extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Sitelink the static model class
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
		return '{{sitelink}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('cate', 'numerical', 'integerOnly'=>true),
			array('title, url', 'length', 'max'=>255),
			array('visable', 'length', 'max'=>1),
			array('create_time', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, cate, title, url, visable, create_time', 'safe', 'on'=>'search'),
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
			'cate' => 'Cate',
			'title' => 'Title',
			'url' => 'Url',
			'visable' => 'Visable',
			'create_time' => 'Create Time',
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
		$criteria->compare('cate',$this->cate);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('url',$this->url,true);
		$criteria->compare('visable',$this->visable,true);
		$criteria->compare('create_time',$this->create_time,true);
		$criteria -> order= "create_time desc";

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'Pagination'=>array('pageSize'=>20),
		));
	}
	
	/**
	 * @return string 
	 */
	public function  getTitleLink(){
		return CHtml::link($this -> title,$this -> url);
	}
}