<?php

/**
 * This is the model class for table "tbl_consultation".
 *
 * The followings are the available columns in table 'tbl_consultation':
 * @property integer $id
 * @property string $surname
 * @property string $name
 * @property string $last_name
 * @property integer $group_id
 * @property string $starttime
 * @property integer $user_id
 * @property integer $lesson_id
 * @property string $checkpoint
 */
class Consultation extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_consultation';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('surname, name, last_name, group_id, starttime, user_id, lesson_id', 'required'),
			array('group_id, user_id, lesson_id', 'numerical', 'integerOnly'=>true),
			array('surname, name, last_name', 'length', 'max'=>64),
			array('checkpoint', 'length', 'max'=>128),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, surname, name, last_name, group_id, starttime, user_id, lesson_id, checkpoint', 'safe', 'on'=>'search'),
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
			'surname' => 'Фамилия',
			'name' => 'Имя',
			'last_name' => 'Отчество',
			'group_id' => 'Группа',
			'starttime' => 'Дата',
			'user_id' => 'Преподаватель',
			'lesson_id' => 'Дисциплина',
			'checkpoint' => 'Контрольная точка',
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
		$criteria->compare('surname',$this->surname,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('last_name',$this->last_name,true);
		$criteria->compare('group_id',$this->group_id);
		$criteria->compare('starttime',$this->starttime,true);
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('lesson_id',$this->lesson_id);
		$criteria->compare('checkpoint',$this->checkpoint,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Consultation the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	/**
	 * Get existed consultations(s)
	 * @param $params array
	 *
	 * @return array
	 */
	public function getConsultations($params = array())
	{
		$selectAliases = '*,'
			. 'consultation.id as consultation_id,'
			. 'group.title as group_title,'
			. 'lesson.title as lesson_title,'
			. 'consultation.surname as consultation_surname,'
			. 'consultation.name as consultation_name,'
			. 'consultation.last_name as consultation_last_name,'
		;
		
		$select = Yii::app()->db->createCommand()
			->select($selectAliases)
			->from($this->tableName() . ' consultation')
			->leftJoin('tbl_group group', 'group.id = consultation.group_id')
			->leftJoin('tbl_lesson lesson', 'lesson.id = consultation.lesson_id')
			->leftJoin('tbl_user user', 'user.id = consultation.user_id')
			;
		
		// by consultation id
		if (isset($params['id']) and !empty($params['id'])) {
			$select->where("`consultation`.`id` = {$params['id']}");
		}
		
		// by teacher
		if (isset($params['teacher']) and !empty($params['teacher'])) {
			$select->where('`user`.`role` = teacher')
			 ->where("`consultation`.`user_id` = " . (int) $params['teacher']);
		}
		
		// by group
		if (isset($params['group']) and !empty($params['group'])) {
			$select->where("`consultation`.`group_id` = " . (int) $params['group']);
		}
		
		// order
		if (isset($params['order']) and !empty($params['order'])) {
			$select->order($params['order']);
		}
		
		//echo '<pre>'; print_r($select->text); echo '</pre>'; exit;
		
		// associative array
		if (isset($params['assoc']) and !empty($params['assoc'])) {
			
			// single row
			if (isset($params['id']) and !empty($params['id'])) {
				return $select->queryAll();
			}
			
			// a lot of rows
			foreach ($select->queryAll() as $row) {
				$selectAssoc[$row['consultation_id']] = $row;
			}
			
			return $selectAssoc;
		}
		
		$select->queryAll();
		
		return $select;
	}
}
