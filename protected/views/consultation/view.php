<?php
/* @var $this ConsultationController */
/* @var $model Consultation */

$this->breadcrumbs=array(
	'Консультации'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'Записавшиеся студенты', 'url'=>array('index')),
	array('label'=>'Запись на Консультацию', 'url'=>array('create')),
	array('label'=>'Изменить Консультацию', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Удалить Консультацию', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Управление Консультациями', 'url'=>array('admin')),
);
?>

<h1>Просмотр Консультации #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id' => 'consultation-grid',
	'dataProvider' => $dataProvider,
	'columns' => array(
		array('header' => 'id', 'value' => '$data[\'consultation_id\']'),
		array('header' => 'Дата', 'value' => '$data[\'starttime\']'),
		array('header' => 'Предмет', 'value' => '$data[\'lesson_title\']'),
		array('header' => 'Аудитория', 'value' => '$data[\'classroom\']'),
		array('header' => 'ФИО студента:', 'value' => '$data[\'consultation_surname\']
																								. \' \'
																								. substr($data[\'consultation_name\'], 0, 2)
																								. \'. \'
																								. substr($data[\'consultation_last_name\'], 0, 2)
																								. \'. \''),
		array('header' => 'ФИО преподавателя:', 'value' => '$data[\'last_name\']
																								. \' \'
																								. substr($data[\'name\'], 0, 2)
																								. \'. \'
																								. substr($data[\'surname\'], 0, 2)
																								. \'. \''),
		array('header' => 'Группа', 'value' => '$data[\'group_title\']'),
		array('header' => 'К.т.', 'value' => '$data[\'checkpoint\']'),
	)
)); ?>
