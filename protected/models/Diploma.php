<?php

/**
 * This is the model class for table "tbl_diploma".
 *
 * The followings are the available columns in table 'tbl_diploma':
 * @property integer $id
 * @property string $surname
 * @property string $name
 * @property string $last_name
 * @property integer $group_id
 * @property string $starttime
 * @property integer $user_id
 * @property string $diploma_direction_type
 * @property integer $rating
 */
class Diploma extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_diploma';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('surname, name, last_name, group_id, starttime, user_id, diploma_direction_type', 'required'),
			array('group_id, user_id, rating', 'numerical', 'integerOnly'=>true),
			array('surname, name, last_name', 'length', 'max'=>64),
			array('diploma_direction_type', 'length', 'max'=>4),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, surname, name, last_name, group_id, starttime, user_id, diploma_direction_type, rating', 'safe', 'on'=>'search'),
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
			'starttime' => 'Дата защиты',
			'user_id' => 'Преподаватель',
			'diploma_direction_type' => 'Направление темы',
			'rating' => 'Оценка',
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
		$criteria->compare('diploma_direction_type',$this->diploma_direction_type,true);
		$criteria->compare('rating',$this->rating);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Diploma the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	/**
	 * Get existed diploma record(s)
	 * @param $params array
	 *
	 * @return array
	 */
	public function getDiplomas($params = array())
	{
		$selectAliases = '*,'
			. 'diploma.id as diploma_id,'
			. 'group.title as group_title,'
			. 'diploma.surname as diploma_surname,'
			. 'diploma.name as diploma_name,'
			. 'diploma.last_name as diploma_last_name'
		;
		
		// avg rating
		if ($params['avg_rating']) $selectAliases .= ', ROUND(AVG(rating), 1) AS avg_rating';
		
		// count diploma_direction_type
		if ($params['count_diploma_direction_type']) $selectAliases .= ', COUNT(diploma_direction_type) AS count_diploma_direction_type';
		
		$select = Yii::app()->db->createCommand()
			->select($selectAliases)
			->from($this->tableName() . ' diploma')
			->leftJoin('tbl_group group', 'group.id = diploma.group_id')
			->leftJoin('tbl_user user', 'user.id = diploma.user_id')
			;
		
		// by diploma id
		if (isset($params['id']) and !empty($params['id'])) {
			$select->andWhere("`diploma`.`id` = {$params['id']}");
		}
		
		// by teacher
		if (isset($params['teacher']) and !empty($params['teacher'])) {
			$select->andWhere('`user`.`role` = teacher')
			 ->andWhere("`diploma`.`user_id` = " . (int) $params['teacher']);
		}
		
		// by group
		if (isset($params['group']) and !empty($params['group'])) {
			$select->andWhere("`diploma`.`group_id` = " . (int) $params['group']);
		}
		
		// by year
		if (isset($params['year']) and !empty($params['year'])) {
			$select->andWhere("`diploma`.`starttime` LIKE " . '\'' . (int) $params['year'] . '%\'');
		}
		
		// group_by
		if (isset($params['group_by']) and !empty($params['group_by'])) {
			$select->group($params['group_by']);
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
				$selectAssoc[$row['diploma_id']] = $row;
			}
			
			return $selectAssoc;
		}
		
		$select->queryAll();
		
		return $select;
	}
}
