<?php

class ScheduleController extends Controller
{
	public function actionIndex()
	{
		$this->render('index');
	}
	
	/**
	 * Main schedule
	 */
	public function actionSchedule($course = null, $group = null, $trimester = null, $teacher = null)
	{
		$model = new Relation();
		
		$params = array(
			'assoc' => true,
		);
		
		if (!empty($course)) $params['course'] = (int) $course;
		if (!empty($group)) $params['group'] = (int) $group;
		if (!empty($trimester)) $params['trimester'] = (int) $trimester;
		if (!empty($teacher)) $params['teacher'] = (int) $teacher;
		
		$schedules = $model->getSchedules($params);
		$schedulesDays = array();
		
		// sort
		if (!empty($schedules)) {
			foreach ($schedules as $key => $schedule) {
				$schedulesDays[$schedule['day_of_week']][$schedule['lesson_number']][] = $schedule;
			}
			
			// empty lessons at that day
			if (!array_key_exists('monday', $schedulesDays)) $schedulesDays['monday'] = array('empty' => '');
			if (!array_key_exists('tuesday', $schedulesDays)) $schedulesDays['tuesday'] = array('empty' => '');
			if (!array_key_exists('wednesday', $schedulesDays)) $schedulesDays['wednesday'] = array('empty' => '');
			if (!array_key_exists('thursday', $schedulesDays)) $schedulesDays['thursday'] = array('empty' => '');
			if (!array_key_exists('friday', $schedulesDays)) $schedulesDays['friday'] = array('empty' => '');
			
			// add empty lessons
			$schedulesDaysTmp = array();
			foreach ($schedulesDays as $day => $lessonNumbers) {
				// delete empty key => value
				if (array_key_exists('empty', $lessonNumbers)) unset($lessonNumbers['empty']);
				// add empty lessons
				if (!array_key_exists('first', $lessonNumbers)) $lessonNumbers['first'] = array('empty' => '');
				if (!array_key_exists('second', $lessonNumbers)) $lessonNumbers['second'] = array('empty' => '');
				if (!array_key_exists('third', $lessonNumbers)) $lessonNumbers['third'] = array('empty' => '');
				if (!array_key_exists('fourth', $lessonNumbers)) $lessonNumbers['fourth'] = array('empty' => '');
				if (!array_key_exists('fifth', $lessonNumbers)) $lessonNumbers['fifth'] = array('empty' => '');
				$schedulesDaysTmp[$day] = $lessonNumbers;
			}
			
			$schedulesDays = $schedulesDaysTmp;
			
			// legendary sort
			$schedulesDaysTmp = array();
			foreach ($schedulesDays as $day => $lessonNumbers) {
				$schedulesDaysTmp[$day]['first'] = $lessonNumbers['first'];
				$schedulesDaysTmp[$day]['second'] = $lessonNumbers['second'];
				$schedulesDaysTmp[$day]['third'] = $lessonNumbers['third'];
				$schedulesDaysTmp[$day]['fourth'] = $lessonNumbers['fourth'];
				$schedulesDaysTmp[$day]['fifth'] = $lessonNumbers['fifth'];
			}
			
			$schedulesDays = $schedulesDaysTmp;
		}
		
		$daysTranslate = array(
			'monday' => 'Понедельник',
			'tuesday' => 'Вторник',
			'wednesday' => 'Среда',
			'thursday' => 'Четверг',
			'friday' => 'Пятница',
		);
		
		$group = new Group();
		$groups = $group->getGroups(array('assoc' => true));
		
		$user = new User();
		$teachers = $user->getUsers(array('role' => 'teacher', 'assoc' => true));
		
		$this->render('schedule', array(
			'schedules' => $schedules,
			'schedulesDays' => $schedulesDays,
			'daysTranslate' => $daysTranslate,
			'groups' => $groups,
			'teachers' => $teachers,
			'model' => $model,
		));
		
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