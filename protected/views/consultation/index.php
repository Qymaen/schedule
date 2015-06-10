<?php
/* @var $this ConsultationController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Consultations',
);

$this->menu=array(
	array('label'=>'Create Consultation', 'url'=>array('create')),
	array('label'=>'Manage Consultation', 'url'=>array('admin')),
);
?>

<h1>Consultations</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'dataProvider' => $dataProvider,
	'columns' => array(
		//array('header' => 'id', 'value' => '$data[\'consultation_id\']'),
		array('header' => 'Дата', 'value' => '$data[\'starttime\']'),
		array('header' => 'Предмет', 'value' => '$data[\'lesson_title\']'),
		array('header' => 'Аудитория', 'value' => '$data[\'classroom\']'),
		array('header' => 'ФИО студента:', 'value' => '$data[\'consultation_surname\']
																								. \' \'
																								. substr($data[\'consultation_name\'], 0, 2)
																								. \'. \'
																								. substr($data[\'consultation_last_name\'], 0, 2)
																								. \'. \''),
		array('header' => 'ФИО преподавателя:', 'value' => '$data[\'surname\']
																								. \' \'
																								. substr($data[\'name\'], 0, 2)
																								. \'. \'
																								. substr($data[\'last_name\'], 0, 2)
																								. \'. \''),
		array('header' => 'Группа', 'value' => '$data[\'group_title\']'),
		
	),
)); ?>
