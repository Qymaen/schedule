<?php

/**
 * This is the model class for table "tbl_user".
 *
 * The followings are the available columns in table 'tbl_user':
 * @property integer $id
 * @property string $username
 * @property string $password
 * @property string $email
 * @property string $role
 * @property string $phone
 * @property string $name
 * @property string $surname
 * @property string $last_name
 * @property integer $group_id
 */
class User extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_user';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('username, password, email, role, phone, name, surname, last_name', 'required'),
			array('group_id', 'numerical', 'integerOnly'=>true),
			array('username, password, email, name, surname, last_name', 'length', 'max'=>128),
			array('role', 'length', 'max'=>7),
			array('phone', 'length', 'max'=>10),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, username, password, email, role, phone, name, surname, last_name, group_id', 'safe', 'on'=>'search'),
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
			'username' => 'Логин',
			'password' => 'Пароль',
			'email' => 'Email',
			'role' => 'Роль',
			'phone' => 'Номер телефона',
			'name' => 'Имя',
			'surname' => 'Отчество',
			'last_name' => 'Фамилия',
			'group_id' => 'Группа',
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
		$criteria->compare('username',$this->username,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('role',$this->role,true);
		$criteria->compare('phone',$this->phone,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('surname',$this->surname,true);
		$criteria->compare('last_name',$this->last_name,true);
		$criteria->compare('group_id',$this->group_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return User the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	/**
	 * Get existed user(s)
	 * @param $params array
	 *
	 * @return array
	 */
	public function getUsers($params = array())
	{
		$select = Yii::app()->db->createCommand()
			->select()
			->from($this->tableName());
		
		// auth params
		if (!empty($params['auth'])) {
			$selectAuth = array();
			
			foreach ($select->queryAll() as $row) {
				$selectAuth[$row['username']] = $row['password'];
			}
			
			return $selectAuth;
		}
		
		// by role
		if (!empty($params['role'])) {
			$select->andWhere('role = "'. $params['role'] . '"');
		}
		
		// by group
		if (!empty($params['group_id'])) {
			$select->andWhere("group_id = " . (int) $params['group_id']);
		}
		
		// by id
		if (!empty($params['user_id'])) {
			$select->andWhere("user_id = " . (int) $params['user_id']);
		}
		
		if ($params['assoc'] == true) {
			$selectAssoc = array('' => '');
			
			foreach ($select->queryAll() as $row) {
				$selectAssoc[$row['id']] = $row['last_name']
					. ' '
					. substr($row['name'], 0, 2)
					. '.'
					. substr($row['surname'], 0, 2)
					. '.';
			}
			
			return $selectAssoc;
		}
		
		return $select->queryAll();
	}
}
