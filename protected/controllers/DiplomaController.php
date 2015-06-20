<?php

class DiplomaController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
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
				'actions'=>array('index','view', 'quality'),
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

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$model = new Diploma();
		$diplomas = $model->getDiplomas(array('assoc' => true, 'id' => $id));
		
		$dataProvider = new CArrayDataProvider($diplomas, array(
			'pagination' => array(
					'pageSize' => 10,
			),
		));
		
		$this->render('view',array(
			'model'=>$this->loadModel($id),
			'dataProvider' => $dataProvider,
			'diplomas' => $diplomas,
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Diploma;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Diploma']))
		{
			$model->attributes=$_POST['Diploma'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}
		
		// groups
		$group = new Group();
		$groups = $group->getGroups(array('assoc' => true));
		
		// user / teachers
		$user = new User();
		$users = $user->getUsers(array('role' => 'teacher', 'assoc' => true));
		
		$this->render('create',array(
			'model'=>$model,
			'groups' => $groups,
			'users' => $users,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Diploma']))
		{
			$model->attributes=$_POST['Diploma'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}
		
		// groups
		$group = new Group();
		$groups = $group->getGroups(array('assoc' => true));
		
		// user / teachers
		$user = new User();
		$users = $user->getUsers(array('role' => 'teacher', 'assoc' => true));
		
		$this->render('update',array(
			'model'=>$model,
			'groups' => $groups,
			'users' => $users,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$model = new Diploma();
		$diplomas = $model->getDiplomas(array('assoc' => true));
		
		$dataProvider = new CArrayDataProvider($diplomas, array(
			'pagination' => array(
					'pageSize' => 10,
			),
		));
		
		$this->render('index',array(
			'model'=> $model,
			'dataProvider' => $dataProvider,
			'diplomas' => $diplomas,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Diploma('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Diploma']))
			$model->attributes=$_GET['Diploma'];
		
		$diplomas = $model->getDiplomas(array('assoc' => true));
		
		$dataProvider = new CArrayDataProvider($diplomas, array(
			'pagination' => array(
					'pageSize' => 10,
			),
		));
		
		$this->render('admin',array(
			'model'=> $model,
			'dataProvider' => $dataProvider,
			'diplomas' => $diplomas,
		));
	}
	
	
	/**
	 * accounting quality for all diplomas
	 */
	public function actionQuality($year = null, $group = null)
	{
		$model = new Diploma();
		$params = array(
			'assoc' => true,
			'avg_rating' => true,
			'group_by' => 'diploma_direction_type',
			'order' => 'avg_rating DESC',
		);
		
		if ($year) $params['year'] = (int) $year;
		if ($group) $params['group'] = (int) $group;
		
		$diplomas = $model->getDiplomas($params);
		
		$dataProvider = new CArrayDataProvider($diplomas, array(
			'pagination' => array(
					'pageSize' => 10,
			),
		));
		
		// groups
		$group = new Group();
		$groups = $group->getGroups(array('assoc' => true));
		
		// remove useless params
		unset($params['order']);
		unset($params['avg_rating']);
		
		// popular diploma direction type
		$params['count_diploma_direction_type'] = true;
		$popularDiplomaDirectionTypes = $model->getDiplomas($params);
		
		// sort diploma direction type
		$popularDiplomaDirectionTypesTmp = array();
		foreach ($popularDiplomaDirectionTypes as $key => $data) {
			//$popularDiplomaDirectionTypesTmp[$data['diploma_direction_type']] = $data['count_diploma_direction_type'];
			$popularDiplomaDirectionTypesTmp[$key]['value'] = $data['count_diploma_direction_type'];
			$popularDiplomaDirectionTypesTmp[$key]['label'] = $data['diploma_direction_type'];
			$popularDiplomaDirectionTypesTmp[$key]['color'] = 'rgba('
																												. mt_rand(0, 255) . ','
																												. mt_rand(0, 255) . ','
																												. mt_rand(0, 255) . ','
																												. '0.8'
																												. ')';
		}
		
		$popularDiplomaDirectionTypes = $popularDiplomaDirectionTypesTmp;
		
		// popular rating
		unset($params['group_by']);
		unset($params['count_diploma_direction_type']);
		$params['order'] = 'rating DESC';
		$popularRatings = $model->getDiplomas($params);
		
		// sort rating
		$popularRatingsTmp = array();
		$countFive = $countFour = $countThree = 0;
		foreach ($popularRatings as $data) {
			if ($data['rating'] >= 90 and $data['rating'] <= 100) $popularRatingsTmp['0'] = ++$countFive;
			if ($data['rating'] >= 75 and $data['rating'] <= 89) $popularRatingsTmp['1'] = ++$countFour;
			if ($data['rating'] >= 55 and $data['rating'] <= 74) $popularRatingsTmp['2'] = ++$countThree;
		}
		
		$popularRatings = $popularRatingsTmp;
		
		$this->render('quality',array(
			'model' => $model,
			'dataProvider' => $dataProvider,
			'diplomas' => $diplomas,
			'params' => $params,
			'groups' => $groups,
			'popularRatings' => $popularRatings,
			'popularDiplomaDirectionTypes' => $popularDiplomaDirectionTypes,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Diploma the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Diploma::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Diploma $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='diploma-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
