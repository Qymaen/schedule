<?php

class DeliveryController extends Controller
{
	public function actionIndex()
	{
		$group = new Group();
		$user = new User();
		$model = new Delivery();
		
		$groups = $group->getGroups(array('assoc' => true));
		
		// if form submited
		if (!empty($_POST) and !empty($_POST['group_id']) and !empty($_POST['message'])) {
			
			$model->attributes = $_POST;
			
			$groupId = $model->attributes['group_id'];
			$message = $model->attributes['message'];
			
			// get phone numbers from group
			$students = $user->getUsers(['group_id' => $groupId, 'role' => 'student']);
			
			$phoneNumbers = [];
			foreach ($students as $student) {
				$phoneNumbers[] = '38' . $student['phone']; // add Ukraine code number
			}
			
			$phoneNumbersString = implode('+', $phoneNumbers);
			
			// sms delivery
			$sms = new \Zelenin\Smsru();
			$apiId = 'a6ae6f3e-ee39-1654-85cd-5d08c14bbc47';
			$sms->setApiId($apiId);
			
			$mail = $sms->smsMail($phoneNumbersString, 'Тестируем расписание', 'DGMA');
			
			if ($mail) {
				$status = 'message_send';
				$message = 'Сообщение отправлено!';
			} else {
				$status = 'message_error';
				$message = 'Произошла ошибка!';
			}
		}
		
		$this->render('index', array(
			'status' => $status,
			'message' => $message,
			'groups' => $groups,
			'model' => $model,
		));
	}
	
	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

}