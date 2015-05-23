<?php
/* @var $this RelationController */
/* @var $model Relation */

$this->breadcrumbs=array(
	'Relations'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Relation', 'url'=>array('index')),
	array('label'=>'Create Relation', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#relation-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Relations</h1>

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
							'url'=>'Yii::app()->createUrl("relation/view", array("id"=>$data[\'relation_id\']))',
					),
					'update' => array(
							'label' => '',
							'imageUrl' => '/assets/83c7b4ba/gridview/update.png',
							'options' => array(
								'class' => 'icon-edit',
							),
							'url'=>'Yii::app()->createUrl("relation/update", array("id"=>$data[\'relation_id\']))',
					),
					'delete' => array(
							'label' => '',
							'imageUrl' => '/assets/83c7b4ba/gridview/delete.png',
							'options' => array(
								'class' => 'icon-remove',
							),
							'url'=>'Yii::app()->createUrl("relation/delete", array("id"=>$data[\'relation_id\']))',
					),
			),
		),
	),
)); ?>
