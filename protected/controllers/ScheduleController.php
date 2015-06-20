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
			'schedule_type' => 'study',
		);
		
		if (!empty($course)) $params['course'] = (int) $course;
		if (!empty($group)) $params['group'] = (int) $group;
		if (!empty($trimester)) $params['trimester'] = (int) $trimester;
		if (!empty($teacher)) $params['teacher'] = (int) $teacher;
		
		// Schedules for study type ************************************************
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
		
		// Schedules for session type **********************************************
		$params['schedule_type'] = 'session';
		$schedulesSession = $model->getSchedules($params);
		$schedulesSessionDays = array();
		
		// sort
		if (!empty($schedulesSession)) {
			foreach ($schedulesSession as $key => $schedule) {
				$schedulesSessionDays[$schedule['day_of_week']][$schedule['lesson_number']][] = $schedule;
			}
			
			// empty lessons at that day
			if (!array_key_exists('monday', $schedulesSessionDays)) $schedulesSessionDays['monday'] = array('empty' => '');
			if (!array_key_exists('tuesday', $schedulesSessionDays)) $schedulesSessionDays['tuesday'] = array('empty' => '');
			if (!array_key_exists('wednesday', $schedulesSessionDays)) $schedulesSessionDays['wednesday'] = array('empty' => '');
			if (!array_key_exists('thursday', $schedulesSessionDays)) $schedulesSessionDays['thursday'] = array('empty' => '');
			if (!array_key_exists('friday', $schedulesSessionDays)) $schedulesSessionDays['friday'] = array('empty' => '');
			
			// add empty lessons
			$schedulesSessionDaysTmp = array();
			foreach ($schedulesSessionDays as $day => $lessonNumbers) {
				// delete empty key => value
				if (array_key_exists('empty', $lessonNumbers)) unset($lessonNumbers['empty']);
				// add empty lessons
				if (!array_key_exists('first', $lessonNumbers)) $lessonNumbers['first'] = array('empty' => '');
				if (!array_key_exists('second', $lessonNumbers)) $lessonNumbers['second'] = array('empty' => '');
				if (!array_key_exists('third', $lessonNumbers)) $lessonNumbers['third'] = array('empty' => '');
				if (!array_key_exists('fourth', $lessonNumbers)) $lessonNumbers['fourth'] = array('empty' => '');
				if (!array_key_exists('fifth', $lessonNumbers)) $lessonNumbers['fifth'] = array('empty' => '');
				$schedulesSessionDaysTmp[$day] = $lessonNumbers;
			}
			
			$schedulesSessionDays = $schedulesSessionDaysTmp;
			
			// legendary sort
			$schedulesSessionDaysTmp = array();
			foreach ($schedulesSessionDays as $day => $lessonNumbers) {
				$schedulesSessionDaysTmp[$day]['first'] = $lessonNumbers['first'];
				$schedulesSessionDaysTmp[$day]['second'] = $lessonNumbers['second'];
				$schedulesSessionDaysTmp[$day]['third'] = $lessonNumbers['third'];
				$schedulesSessionDaysTmp[$day]['fourth'] = $lessonNumbers['fourth'];
				$schedulesSessionDaysTmp[$day]['fifth'] = $lessonNumbers['fifth'];
			}
			
			$schedulesSessionDays = $schedulesSessionDaysTmp;
		}
		
		// Schedules for session type **********************************************
		$params['schedule_type'] = 'consultation';
		$schedulesConsultation = $model->getSchedules($params);
		$schedulesConsultationDays = array();
		
		// sort
		if (!empty($schedulesConsultation)) {
			foreach ($schedulesConsultation as $key => $schedule) {
				$schedulesConsultationDays[$schedule['day_of_week']][$schedule['lesson_number']][] = $schedule;
			}
			
			// empty lessons at that day
			if (!array_key_exists('monday', $schedulesConsultationDays)) $schedulesConsultationDays['monday'] = array('empty' => '');
			if (!array_key_exists('tuesday', $schedulesConsultationDays)) $schedulesConsultationDays['tuesday'] = array('empty' => '');
			if (!array_key_exists('wednesday', $schedulesConsultationDays)) $schedulesConsultationDays['wednesday'] = array('empty' => '');
			if (!array_key_exists('thursday', $schedulesConsultationDays)) $schedulesConsultationDays['thursday'] = array('empty' => '');
			if (!array_key_exists('friday', $schedulesConsultationDays)) $schedulesConsultationDays['friday'] = array('empty' => '');
			
			// add empty lessons
			$schedulesConsultationDaysTmp = array();
			foreach ($schedulesConsultationDays as $day => $lessonNumbers) {
				// delete empty key => value
				if (array_key_exists('empty', $lessonNumbers)) unset($lessonNumbers['empty']);
				// add empty lessons
				if (!array_key_exists('first', $lessonNumbers)) $lessonNumbers['first'] = array('empty' => '');
				if (!array_key_exists('second', $lessonNumbers)) $lessonNumbers['second'] = array('empty' => '');
				if (!array_key_exists('third', $lessonNumbers)) $lessonNumbers['third'] = array('empty' => '');
				if (!array_key_exists('fourth', $lessonNumbers)) $lessonNumbers['fourth'] = array('empty' => '');
				if (!array_key_exists('fifth', $lessonNumbers)) $lessonNumbers['fifth'] = array('empty' => '');
				$schedulesConsultationDaysTmp[$day] = $lessonNumbers;
			}
			
			$schedulesConsultationDays = $schedulesConsultationDaysTmp;
			
			// legendary sort
			$schedulesConsultationDaysTmp = array();
			foreach ($schedulesConsultationDays as $day => $lessonNumbers) {
				$schedulesConsultationDaysTmp[$day]['first'] = $lessonNumbers['first'];
				$schedulesConsultationDaysTmp[$day]['second'] = $lessonNumbers['second'];
				$schedulesConsultationDaysTmp[$day]['third'] = $lessonNumbers['third'];
				$schedulesConsultationDaysTmp[$day]['fourth'] = $lessonNumbers['fourth'];
				$schedulesConsultationDaysTmp[$day]['fifth'] = $lessonNumbers['fifth'];
			}
			
			$schedulesConsultationDays = $schedulesConsultationDaysTmp;
		}
		
		$translate = array(
			'monday' => 'Понедельник',
			'tuesday' => 'Вторник',
			'wednesday' => 'Среда',
			'thursday' => 'Четверг',
			'friday' => 'Пятница',
			'exam' => 'Экзамен',
			'offset' => 'Зачет',
		);
		
		$group = new Group();
		$groups = $group->getGroups(array('assoc' => true));
		
		$user = new User();
		$teachers = $user->getUsers(array('role' => 'teacher', 'assoc' => true));
		
		$this->render('schedule', array(
			'schedules' => $schedules,
			'schedulesDays' => $schedulesDays,
			'schedulesSession' => $schedulesSession,
			'schedulesSessionDays' => $schedulesSessionDays,
			'schedulesConsultation' => $schedulesConsultation,
			'schedulesConsultationDays' => $schedulesConsultationDays,
			'translate' => $translate,
			'groups' => $groups,
			'teachers' => $teachers,
			'model' => $model,
			'params' => $params,
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