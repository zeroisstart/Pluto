<?php

/**
 * This is the model class for table "commit_log".
 *
 * The followings are the available columns in table 'commit_log':
 * @property string $ID
 * @property integer $type
 * @property string $file
 */
class CommitLog extends CActiveRecord {
	/**
	 * Returns the static model of the specified AR class.
	 *
	 * @param string $className
	 *        	active record class name.
	 * @return CommitLog the static model class
	 */
	public static function model($className = __CLASS__) {
		return parent::model ( $className );
	}
	
	/**
	 *
	 * @return string the associated database table name
	 */
	public function tableName() {
	    return 'commit_log';
		return '{{commit_log}}';
	}
	
	/**
	 *
	 * @return array validation rules for model attributes.
	 */
	public function rules() {
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array (
				array (
						'type',
						'numerical',
						'integerOnly' => true 
				),
				array (
						'file',
						'safe' 
				),
				// The following rule is used by search().
				// Please remove those attributes that should not be searched.
				array (
						'ID, type, file',
						'safe',
						'on' => 'search' 
				) 
		);
	}
	
	/**
	 *
	 * @return array relational rules.
	 */
	public function relations() {
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array ();
	}
	
	/**
	 *
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels() {
		return array (
				'ID' => 'ID',
				'type' => 'Type',
				'file' => 'File',
				'create_time' => 'Create Time' 
		);
	}
	
	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 *         based on the search/filter conditions.
	 */
	public function search() {
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.
		$criteria = new CDbCriteria ();
		
		$criteria->compare ( 'ID', $this->ID, true );
		$criteria->compare ( 'type', $this->type );
		$criteria->compare ( 'file', $this->file, true );
		$criteria->compare ( 'create_time', $this->create_time, false );
		#$criteria->compare ( 'create_time', '>2013-05-31 14:03:18', false );
		$criteria->order = "create_time desc";
		
		return new CActiveDataProvider ( $this, array (
				'criteria' => $criteria,
				'pagination' => array (
						'pageSize' => 50 
				) 
		) );
	}
}