<?php
/* @var $this DiplomaController */
/* @var $model Diploma */

$this->breadcrumbs=array(
	'Дипломирование'=>array('index'),
	'Создать',
);

$this->menu=array(
	array('label'=>'Учет качества Дипломирования', 'url'=>array('quality')),
	array('label'=>'Список Дипломирования', 'url'=>array('index')),
	array('label'=>'Управление Дипломированием', 'url'=>array('admin')),
);
?>

<h1>Формирование ведомости студента по диплому</h1>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'diploma-create-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// See class documentation of CActiveForm for details on this,
	// you need to use the performAjaxValidation()-method described there.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'Фамилия'); ?>
		<?php echo $form->textField($model,'surname'); ?>
		<?php echo $form->error($model,'surname'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Имя'); ?>
		<?php echo $form->textField($model,'name'); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Отчество'); ?>
		<?php echo $form->textField($model,'last_name'); ?>
		<?php echo $form->error($model,'last_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Группа'); ?>
		<?php echo $form->dropDownList($model,'group_id', $groups); ?>
		<?php echo $form->error($model,'group_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Дата защиты:'); ?>
		<?php
			$this->widget('ext.jui.EJuiDateTimePicker', array(
					'model' => $model,
					'attribute' => 'starttime',
					'language'=> 'ru',
					'mode'    => 'datetime',
					'options'   => array(
							'dateFormat' => 'yy-mm-dd',
							'timeFormat' => 'HH:mm:00',
							'stepMinute' => 30,
					),
			));
		?>
		<?php echo $form->error($model,'starttime'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Выбор преподавателя:'); ?>
		<?php echo $form->dropDownList($model,'user_id', $users); ?>
		<?php echo $form->error($model,'user_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Выбор направления темы:'); ?>
		<?php echo $form->dropDownList($model,'diploma_direction_type', array(
						'web' => 'Web-разработка',
						'sppr' => 'СППР',
						'is' => 'ИС',
					));
		?>
		<?php echo $form->error($model,'diploma_direction_type'); ?>
	</div>


	<div class="row buttons">
		<?php echo CHtml::submitButton('Сформировать'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->