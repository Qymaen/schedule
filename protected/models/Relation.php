<?php

/**
 * This is the model class for table "tbl_relation".
 *
 * The followings are the available columns in table 'tbl_relation':
 * @property integer $id
 * @property integer $lesson_id
 * @property integer $group_id
 * @property integer $user_id
 * @property string $trimester
 * @property string $classroom
 * @property string $day_of_week
 * @property string $week_type
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
			array('lesson_id, group_id, user_id, trimester, classroom, day_of_week', 'required'),
			array('lesson_id, group_id, user_id', 'numerical', 'integerOnly'=>true),
			array('trimester', 'length', 'max'=>1),
			array('classroom', 'length', 'max'=>64),
			array('day_of_week', 'length', 'max'=>9),
			array('week_type', 'length', 'max'=>4),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, lesson_id, group_id, user_id, trimester, classroom, day_of_week, week_type', 'safe', 'on'=>'search'),
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
			'group_id' => 'Group',
			'user_id' => 'User',
			'trimester' => 'Trimester',
			'classroom' => 'Classroom',
			'day_of_week' => 'Day Of Week',
			'week_type' => 'Week Type',
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
		$criteria->compare('group_id',$this->group_id);
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('trimester',$this->trimester,true);
		$criteria->compare('classroom',$this->classroom,true);
		$criteria->compare('day_of_week',$this->day_of_week,true);
		$criteria->compare('week_type',$this->week_type,true);

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
		
		if ($params['assoc'] == true) {
			foreach ($select->queryAll() as $row) {
				$selectAssoc[$row['id']] = $row;
			}
			
			return $selectAssoc;
		}
		
		$select->queryAll();
		
		return $select;
	}
}
