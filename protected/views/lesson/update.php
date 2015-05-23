<?php
/* @var $this LessonController */
/* @var $model Lesson */

$this->breadcrumbs=array(
	'Lessons'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Lesson', 'url'=>array('index')),
	array('label'=>'Create Lesson', 'url'=>array('create')),
	array('label'=>'View Lesson', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Lesson', 'url'=>array('admin')),
);
?>

<h1>Update Lesson <?php echo $model->id; ?></h1>

<div class="form">
	<?php $form=$this->beginWidget('CActiveForm', array(
		'id'=>'lesson-update-form',
		// Please note: When you enable ajax validation, make sure the corresponding
		// controller action is handling ajax validation correctly.
		// See class documentation of CActiveForm for details on this,
		// you need to use the performAjaxValidation()-method described there.
		'enableAjaxValidation'=>false,
	)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textField($model,'title'); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textField($model,'description'); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'classroom'); ?>
		<?php echo $form->textField($model,'classroom'); ?>
		<?php echo $form->error($model,'classroom'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'Тип предмета'); ?>
		<?php echo $form->dropDownList($model,'type', array('lecture' => 'Лекция', 'practice' => 'Практика')); ?>
		<?php echo $form->error($model,'type'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Submit'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->