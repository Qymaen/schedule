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

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id' => 'relation-grid',
	'dataProvider' => $dataProvider,
	'columns' => array(
		array('header' => 'id', 'value' => '$data[\'relation_id\']'),
		array('header' => 'Предмет', 'value' => '$data[\'lesson_title\']'),
		array('header' => 'Номер предмета', 'value' => '$data[\'lesson_number\']'),
		array('header' => 'Описание', 'value' => '$data[\'lesson_description\']'),
		array('header' => 'Аудитория', 'value' => '$data[\'classroom\']'),
		array('header' => 'Фамилия', 'value' => '$data[\'last_name\']'),
		array('header' => 'Имя', 'value' => '$data[\'name\']'),
		array('header' => 'Отчество', 'value' => '$data[\'surname\']'),
		array('header' => 'Группа', 'value' => '$data[\'group_title\']'),
		array('header' => 'День недели', 'value' => '$data[\'day_of_week\']'),
		array('header' => 'Тип недели', 'value' => '$data[\'week_type\']'),
		array('header' => 'Триместр', 'value' => '$data[\'trimester\']'),
	),
)); ?>
