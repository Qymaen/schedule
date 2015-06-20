<?php
/* @var $this DiplomaController */
/* @var $model Diploma */

$this->breadcrumbs=array(
	'Дипломирование'=>array('index'),
	'Управление',
);

$this->menu=array(
	array('label'=>'Учет качества Дипломирования', 'url'=>array('quality')),
	array('label'=>'Список Дипломирования', 'url'=>array('index')),
	array('label'=>'Запись на Дипломирование', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#diploma-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Управление Дипломированием</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id' => 'diploma-grid',
	'dataProvider' => $dataProvider,
	'columns' => array(
		array('header' => 'id', 'value' => '$data[\'diploma_id\']'),
		array('header' => 'Дата', 'value' => '$data[\'starttime\']'),
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
		array('header' => 'Напр. темы', 'value' => '$data[\'diploma_direction_type\']'),
		array('header' => 'Оценка', 'value' => '$data[\'rating\']'),
		array(
			'class'=>'CButtonColumn',
			'template' => '{view} {update} {delete}',
			'buttons' => array(
					'view' => array(
							'label' => '',
							'imageUrl' => '/assets/83c7b4ba/gridview/view.png',
							'options' => array(
								'class' => 'icon-search',
							),
							'url'=>'Yii::app()->createUrl("diploma/view", array("id"=>$data[\'diploma_id\']))',
					),
					'update' => array(
							'label' => '',
							'imageUrl' => '/assets/83c7b4ba/gridview/update.png',
							'options' => array(
								'class' => 'icon-edit',
							),
							'url'=>'Yii::app()->createUrl("diploma/update", array("id"=>$data[\'diploma_id\']))',
					),
					'delete' => array(
							'label' => '',
							'imageUrl' => '/assets/83c7b4ba/gridview/delete.png',
							'options' => array(
								'class' => 'icon-remove',
							),
							'url'=>'Yii::app()->createUrl("diploma/delete", array("id"=>$data[\'diploma_id\']))',
					),
			),
		),
	),
)); ?>
