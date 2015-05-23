<?php

class ScheduleController extends Controller
{
	public function actionIndex()
	{
		$this->render('index');
	}
	
	/**
	 * Groups schedule
	 */
	public function actionStudent()
	{
		$model = new Relation();
		$schedules = $model->getSchedules(array('assoc' => true));
		$schedulesDays = array();
		
		foreach ($schedules as $key => $schedule) {
			$schedulesDays[$schedule['day_of_week']][] = $schedule;
		}
		
		$this->render('student', array(
			'schedules' => $schedules,
			'schedulesDays' => $schedulesDays,
		));
	}
	
	/**
	 * Teachers schedule
	 */
	public function actionTeacher()
	{
		$this->render('teacher');
	}

	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}