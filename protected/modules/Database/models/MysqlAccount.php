<?php

/**
 * This is the model class for table "database_mysql_account".
 *
 * The followings are the available columns in table 'database_mysql_account':
 * @property string $ID
 * @property string $host
 * @property string $username
 * @property string $password
 * @property integer $port
 * @property string $create_time
 */
class MysqlAccount extends CActiveRecord {
	/**
	 * Returns the static model of the specified AR class.
	 *
	 * @param string $className
	 *        	active record class name.
	 * @return MysqlAccount the static model class
	 */
	public static function model($className = __CLASS__) {
		return parent::model ( $className );
	}
	
	/**
	 *
	 * @return string the associated database table name
	 */
	public function tableName() {
		return '{{database_mysql_account}}';
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
						'port',
						'numerical',
						'integerOnly' => true 
				),
				array (
						'host',
						'length',
						'max' => 16 
				),
				array (
						'username, password',
						'length',
						'max' => 50 
				),
				array (
						'create_time',
						'safe' 
				),
				// The following rule is used by search().
				// Please remove those attributes that should not be searched.
				array (
						'ID, host, username, password, port, create_time',
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
				'host' => 'Host',
				'username' => 'Username',
				'password' => 'Password',
				'port' => 'Port',
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
		$criteria->compare ( 'host', $this->host, true );
		$criteria->compare ( 'username', $this->username, true );
		$criteria->compare ( 'password', $this->password, true );
		$criteria->compare ( 'port', $this->port );
		$criteria->compare ( 'create_time', $this->create_time, true );
		
		return new CActiveDataProvider ( $this, array (
				'criteria' => $criteria 
		) );
	}
	/**
	 * 获取所有的链接
	 *
	 * @return multitype:Ambigous <>
	 */
	public function getAllConnections() {
		$data = $this->findAll ();
		$ary_connection = array ();
		foreach ( $data as $key => $val ) {
			$ary_connection [$val->ID] = $val->host;
		}
		return $ary_connection;
	}
}