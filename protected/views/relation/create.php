<?php
/* @var $this RelationController */
/* @var $model Relation */
/* @var $form CActiveForm */
?>

<?php

$this->breadcrumbs=array(
	'Schedule'=>array('create'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Schedule', 'url'=>array('index')),
	array('label'=>'Create Schedule', 'url'=>array('create')),
	array('label'=>'View Schedule', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Schedule', 'url'=>array('admin')),
);
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'relation-create-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// See class documentation of CActiveForm for details on this,
	// you need to use the performAjaxValidation()-method described there.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'Предмет'); ?>
		<?php echo $form->dropDownList($model,'lesson_id', $lessons); ?>
		<?php echo $form->error($model,'lesson_id'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'Номер предмета'); ?>
		<?php echo $form->dropDownList($model,'lesson_number', array(
				'first' => 'Первый',
				'second' => 'Второй',
				'third' => 'Третий',
				'fourth '=> 'Четвертый',
				'fifth' => 'Пятый',
			)); ?>
		<?php echo $form->error($model,'lesson_number'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Группа'); ?>
		<?php echo $form->dropDownList($model,'group_id', $groups); ?>
		<?php echo $form->error($model,'group_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Преподаватель'); ?>
		<?php echo $form->dropDownList($model,'user_id', $users); ?>
		<?php echo $form->error($model,'user_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Аудитория'); ?>
		<?php echo $form->dropDownList($model,'classroom', $classrooms); ?>
		<?php echo $form->error($model,'classroom'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'День недели'); ?>
		<?php echo $form->dropDownList($model,'day_of_week', array(
				'monday' => 'Понедельник',
				'tuesday' => 'Вторник',
				'wednesday' => 'Среда',
				'thursday '=> 'Четверг',
				'friday' => 'Пятница',
				'saturday' => 'Суббота',
				'sunday' => 'Воскресенье',
			)); ?>
		<?php echo $form->error($model,'day_of_week'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Тип недели'); ?>
		<?php echo $form->dropDownList($model,'week_type', array('even' => 'Четная', 'odd' => 'Нечетная', 'both' => 'Обе')); ?>
		<?php echo $form->error($model,'week_type'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'Триместр'); ?>
		<?php echo $form->dropDownList($model,'trimester', array('1' => 'Первый', '2' => 'Второй', '3' => 'Третий',)); ?>
		<?php echo $form->error($model,'trimester'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Submit'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->