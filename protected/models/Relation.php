<?php

/**
 * This is the model class for table "tbl_relation".
 *
 * The followings are the available columns in table 'tbl_relation':
 * @property integer $id
 * @property integer $lesson_id
 * @property string $lesson_number
 * @property integer $group_id
 * @property integer $user_id
 * @property string $trimester
 * @property string $classroom
 * @property string $day_of_week
 * @property string $week_type
 * @property string $schedule_type
 * @property string $session_type
 */
class Relation extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_relation';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('lesson_id, lesson_number, group_id, user_id, trimester, classroom, day_of_week', 'required'),
			array('lesson_id, group_id, user_id', 'numerical', 'integerOnly'=>true),
			array('lesson_number, session_type', 'length', 'max'=>7),
			array('trimester', 'length', 'max'=>1),
			array('classroom', 'length', 'max'=>64),
			array('day_of_week', 'length', 'max'=>9),
			array('week_type', 'length', 'max'=>4),
			array('schedule_type', 'length', 'max'=>12),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, lesson_id, lesson_number, group_id, user_id, trimester, classroom, day_of_week, week_type', 'safe', 'on'=>'search'),
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
			'lesson_id' => 'Lesson',
			'lesson_number' => 'Lesson Number',
			'group_id' => 'Group',
			'user_id' => 'User',
			'trimester' => 'Trimester',
			'classroom' => 'Classroom',
			'day_of_week' => 'Day Of Week',
			'week_type' => 'Week Type',
			'schedule_type' => 'Тип расписания',
			'session_type' => 'Экзамен/Зачет',
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
		$criteria->compare('lesson_id',$this->lesson_id);
		$criteria->compare('lesson_number',$this->lesson_number,true);
		$criteria->compare('group_id',$this->group_id);
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('trimester',$this->trimester,true);
		$criteria->compare('classroom',$this->classroom,true);
		$criteria->compare('day_of_week',$this->day_of_week,true);
		$criteria->compare('week_type',$this->week_type,true);
		$criteria->compare('schedule_type',$this->schedule_type,true);
		$criteria->compare('session_type',$this->session_type,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Relation the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	/**
	 * Get existed schedule(s)
	 * @param $params array
	 *
	 * @return array
	 */
	public function getSchedules($params = array())
	{
		$selectAliases = '*,'
			. 'relation.id as relation_id,'
			. 'group.title as group_title,'
			. 'group.description as group_description,'
			. 'lesson.title as lesson_title,'
			. 'lesson.description as lesson_description,'
			. 'lesson.classroom as lesson_classroom,'
		;
		
		$select = Yii::app()->db->createCommand()
			->select($selectAliases)
			->from($this->tableName() . ' relation')
			->leftJoin('tbl_group group', 'group.id = relation.group_id')
			->leftJoin('tbl_lesson lesson', 'lesson.id = relation.lesson_id')
			->leftJoin('tbl_user user', 'user.id = relation.user_id')
			;
		
		// by schedule_type
		if (isset($params['schedule_type']) and !empty($params['schedule_type'])) {
			$select->andWhere("`relation`.`schedule_type` = '{$params['schedule_type']}'");
		}
		
		// by relation id
		if (isset($params['id']) and !empty($params['id'])) {
			$select->andWhere("`relation`.`id` = {$params['id']}");
		}
		
		// by teacher
		if (isset($params['teacher']) and !empty($params['teacher'])) {
			$select->andWhere("`user`.`role` = 'teacher'")
			 ->andWhere("`relation`.`user_id` = " . (int) $params['teacher']);
		}
		
		// by group
		if (isset($params['group']) and !empty($params['group'])) {
			$select->andWhere("`relation`.`group_id` = " . (int) $params['group']);
		}
		
		// by trimester
		if (isset($params['trimester']) and !empty($params['trimester'])) {
			$select->andWhere("`relation`.`trimester` = " . (int) $params['trimester']);
		}
		
		// by course
		if (isset($params['course']) and !empty($params['course'])) {
			$course = (int) $params['course'];
			$nowYear = date('Y');
			$nowMonth = date('n');
			
			$course = $nowYear - $course;
			$course = ($nowMonth < 8) ? $course : $course - 1;
			
			$select->andWhere("`group`.`year` = " . $course);
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
				$selectAssoc[$row['relation_id']] = $row;
			}
			
			return $selectAssoc;
		}
		
		$select->queryAll();
		
		return $select;
	}
}
