<?php
/**
 * This is the model class for table "{{commands}}".
 *
 * The followings are the available columns in table '{{commands}}':
 * @property string $id
 * @property string $command
 * @property string $detail
 * @property string $create_time
 * @property integer $type
 */
class Commands extends CActiveRecord
{

    /**
     * Returns the static model of the specified AR class.
     * 
     * @param $className string
     *            active record class name.
     * @return Commands the static model class
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
        return '{{commands}}';
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
                'type', 
                'numerical', 
                'integerOnly' => true
            ), 
            array(
                'command, detail, create_time', 
                'safe'
            ), 
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array(
                'id, command, detail, create_time, type', 
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
            'command' => 'Command', 
            'detail' => 'Detail', 
            'create_time' => 'Create Time', 
            'type' => 'Type'
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
        $criteria->compare('command', $this->command, true);
        $criteria->compare('detail', $this->detail, true);
        $criteria->compare('create_time', $this->create_time, true);
        $criteria->compare('type', $this->type);
        // criteria -> order="create_time desc";
        return new CActiveDataProvider($this, 
                array(
                    'criteria' => $criteria, 
                    'pagination' => array(
                        'pagesize' => 20
                    )
                ));
    }
}