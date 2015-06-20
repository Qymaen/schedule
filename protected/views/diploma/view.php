<?php
/* @var $this DiplomaController */
/* @var $model Diploma */

$this->breadcrumbs=array(
	'Дипломирование'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'Учет качества Дипломирования', 'url'=>array('quality')),
	array('label'=>'Список Дипломирования', 'url'=>array('index')),
	array('label'=>'Запись на Дипломирование', 'url'=>array('create')),
	array('label'=>'Управление Дипломированием', 'url'=>array('admin')),
	array('label'=>'Редактировать Дипломирование', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Удалить Дипломирование', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
);
?>

<h1>Ведомость студента по диплому #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id' => 'diploma-grid',
	'dataProvider' => $dataProvider,
	'template' => '{items}{pager}',
	'columns' => array(
		//array('header' => 'id', 'value' => '$data[\'diploma_id\']'),
		array('header' => 'Группа', 'value' => '$data[\'group_title\']'),
		array('header' => 'ФИО:', 'value' => '$data[\'diploma_surname\']
																								. \' \'
																								. substr($data[\'diploma_name\'], 0, 2)
																								. \'. \'
																								. substr($data[\'diploma_last_name\'], 0, 2)
																								. \'. \''),
		array('header' => 'Дата', 'value' => '$data[\'starttime\']'),
		array('header' => 'Руководитель:', 'value' => '$data[\'last_name\']
																								. \' \'
																								. substr($data[\'name\'], 0, 2)
																								. \'. \'
																								. substr($data[\'surname\'], 0, 2)
																								. \'. \''),
		array('header' => 'Направление', 'value' => '$data[\'diploma_direction_type\']'),
		array('header' => 'Оценка', 'value' => '$data[\'rating\']'),
	)
)); ?>

<button onclick="print()">Распечатать</button>
<a href="<?php echo Yii::app()->request->url; ?>" download><button>Сохранить</button></a>