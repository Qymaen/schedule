<?php
/* @var $this ConsultationController */
/* @var $model Consultation */

$this->breadcrumbs=array(
	'Consultations'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Consultation', 'url'=>array('index')),
	array('label'=>'Create Consultation', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#consultation-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Consultations</h1>

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
		array('header' => 'ФИО преподавателя:', 'value' => '$data[\'surname\']
																								. \' \'
																								. substr($data[\'name\'], 0, 2)
																								. \'. \'
																								. substr($data[\'last_name\'], 0, 2)
																								. \'. \''),
		array('header' => 'Группа', 'value' => '$data[\'group_title\']'),
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
							'url'=>'Yii::app()->createUrl("consultation/view", array("id"=>$data[\'consultation_id\']))',
					),
					'update' => array(
							'label' => '',
							'imageUrl' => '/assets/83c7b4ba/gridview/update.png',
							'options' => array(
								'class' => 'icon-edit',
							),
							'url'=>'Yii::app()->createUrl("consultation/update", array("id"=>$data[\'consultation_id\']))',
					),
					'delete' => array(
							'label' => '',
							'imageUrl' => '/assets/83c7b4ba/gridview/delete.png',
							'options' => array(
								'class' => 'icon-remove',
							),
							'url'=>'Yii::app()->createUrl("consultation/delete", array("id"=>$data[\'consultation_id\']))',
					),
			),
		),
	),
)); ?>