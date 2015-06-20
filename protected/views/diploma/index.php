<?php
/* @var $this DiplomaController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Дипломирование',
);

$this->menu=array(
	array('label'=>'Учет качества Дипломирования', 'url'=>array('quality')),
	array('label'=>'Запись на Дипломирование', 'url'=>array('create')),
	array('label'=>'Управление Дипломированием', 'url'=>array('admin')),
);
?>

<h1>Дипломирование</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'dataProvider' => $dataProvider,
	'columns' => array(
		//array('header' => 'id', 'value' => '$data[\'diploma_id\']'),
		array('header' => 'ФИО студента:', 'value' => '$data[\'diploma_surname\']
																								. \' \'
																								. substr($data[\'diploma_name\'], 0, 2)
																								. \'. \'
																								. substr($data[\'diploma_last_name\'], 0, 2)
																								. \'. \''),
		array('header' => 'ФИО преподавателя:', 'value' => '$data[\'last_name\']
																								. \' \'
																								. substr($data[\'name\'], 0, 2)
																								. \'. \'
																								. substr($data[\'surname\'], 0, 2)
																								. \'. \''),
		array('header' => 'Группа', 'value' => '$data[\'group_title\']'),
		array('header' => 'Дата', 'value' => '$data[\'starttime\']'),
		array('header' => 'Оценка', 'value' => '$data[\'rating\']'),
		
	),
)); ?>
