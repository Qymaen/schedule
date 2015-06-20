<?php
/* @var $this RelationController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Schedule',
);

$this->menu=array(
	array('label'=>'Create Schedule', 'url'=>array('create')),
	array('label'=>'Manage Schedule', 'url'=>array('admin')),
);
?>

<h1>Schedule</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'dataProvider' => $dataProvider,
	'columns' => array(
		array('header' => 'id', 'value' => '$data[\'relation_id\']'),
		array('header' => 'Предмет', 'value' => '$data[\'lesson_title\']'),
		array('header' => 'Описание', 'value' => '$data[\'lesson_description\']'),
		array('header' => 'Аудитория', 'value' => '$data[\'classroom\']'),
		array('header' => 'ФИО преподавателя:', 'value' => '$data[\'last_name\']
																								. \' \'
																								. substr($data[\'name\'], 0, 2)
																								. \'. \'
																								. substr($data[\'surname\'], 0, 2)
																								. \'. \''),
		array('header' => 'Группа', 'value' => '$data[\'group_title\']'),
		array('header' => 'День недели', 'value' => '$data[\'day_of_week\']'),
		array('header' => 'Тип недели', 'value' => '$data[\'week_type\']'),
		array('header' => 'Триместр', 'value' => '$data[\'trimester\']'),
		array('header' => 'Тип расписания', 'value' => '$data[\'schedule_type\']'),
	),
)); ?>
