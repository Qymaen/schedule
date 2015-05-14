<?php

/**
 * This is the model class for table "tbl_lesson".
 *
 * The followings are the available columns in table 'tbl_lesson':
 * @property integer $id
 * @property string $title
 * @property string $description
 * @property string $classroom
 */
class Lesson extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_lesson';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title, description, classroom', 'required'),
			array('title', 'length', 'max'=>128),
			array('description', 'length', 'max'=>1024),
			array('classroom', 'length', 'max'=>64),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, title, description, classroom', 'safe', 'on'=>'search'),
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
			'title' => 'Title',
			'description' => 'Description',
			'classroom' => 'Classroom',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('classroom',$this->classroom,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Lesson the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	/**
	 * Get existed lesson(s)
	 * @param $params array
	 *
	 * @return array
	 */
	public function getLessons($params = array())
	{
		$select = Yii::app()->db->createCommand()
			->select()
			->from($this->tableName())
			->group('title')
			->order('title ASC');
		
		
		if ($params['assoc'] == true) {
			$selectAssoc = array('' => '');
			
			foreach ($select->queryAll() as $row) {
				$selectAssoc[$row['id']] = $row['title'];
			}
			
			return $selectAssoc;
		}
		
		$select->queryAll();
		
		return $select;
	}
	
	/**
	 * Get existed classroom(s)
	 * @param $params array
	 *
	 * @return array
	 */
	public function getClassrooms($params = array())
	{
		$select = Yii::app()->db->createCommand()
			->select()
			->from($this->tableName())
			->group('classroom')
			->order('classroom ASC');
		
		
		if ($params['assoc'] == true) {
			$selectAssoc = array('' => '');
			
			foreach ($select->queryAll() as $row) {
				$selectAssoc[$row['id']] = $row['classroom'];
			}
			
			return $selectAssoc;
		}
		
		$select->queryAll();
		
		return $select;
	}
}
