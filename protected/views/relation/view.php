<?php
/* @var $this RelationController */
/* @var $model Relation */

$this->breadcrumbs=array(
	'Relations'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Relation', 'url'=>array('index')),
	array('label'=>'Create Relation', 'url'=>array('create')),
	array('label'=>'Update Relation', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Relation', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Relation', 'url'=>array('admin')),
);
?>

<h1>View Relation #<?php echo $model->id; ?></h1>

<?php
	
	$params = array(
		array('header' => 'id', 'value' => '$data[\'relation_id\']'),
		array('header' => 'Предмет', 'value' => '$data[\'lesson_title\']'),
		array('header' => 'Номер предмета', 'value' => '$data[\'lesson_number\']'),
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
	);
	
	if ($model->schedule_type === 'session') {
		unset($params[1]); // remove $lesson_title
		$params[] = array('header' => 'Экзамен/Зачет', 'value' => '$data[\'session_type\']'); // add session_type
	} elseif ($model->schedule_type === 'consultation') {
		unset($params[1]); // remove $lesson_title
	} else {
		 
	}

?>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id' => 'relation-grid',
	'dataProvider' => $dataProvider,
	'columns' => $params,
)); ?>
