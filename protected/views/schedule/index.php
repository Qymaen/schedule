<?php
/* @var $this ScheduleController */

$this->breadcrumbs=array(
	'Расписание',
);
?>

<div id="schedule_menu">
	<?php $this->widget('zii.widgets.CMenu',array(
		'items'=>array(
			array('label'=>'Расписание студентов', 'url'=>array('/schedule/student')),
			array('label'=>'Расписание преподавателей', 'url'=>array('/schedule/teacher')),
		),
	)); ?>
</div>