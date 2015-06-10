<?php
/* @var $this ConsultationController */
/* @var $model Consultation */

$this->breadcrumbs=array(
	'Consultations'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Consultation', 'url'=>array('index')),
	array('label'=>'Create Consultation', 'url'=>array('create')),
	array('label'=>'Manage Consultation', 'url'=>array('admin')),
);
?>

<h1>Update Consultation <?php echo $model->id; ?></h1>


<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'consultation-update-form',
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
		<?php echo $form->labelEx($model,'starttime'); ?>
		<?php
			$this->widget('ext.jui.EJuiDateTimePicker', array(
					'model' => $model,
					'attribute' => 'starttime',
					'language'=> 'ru',
					'mode'    => 'datetime',
					'options'   => array(
							'dateFormat' => 'yy-mm-dd',
							'timeFormat' => 'HH:mm:00',
							'stepMinute' => 5,
					),
			));
		?>
		<?php echo $form->error($model,'starttime'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Преподаватель'); ?>
		<?php echo $form->dropDownList($model,'user_id', $users); ?>
		<?php echo $form->error($model,'user_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Дисциплина'); ?>
		<?php echo $form->dropDownList($model,'lesson_id', $lessons); ?>
		<?php echo $form->error($model,'lesson_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Контрольная точка'); ?>
		<?php echo $form->dropDownList($model,'checkpoint', array(
						'' => '',
						'control_work' => 'Контрольная работа',
						'independent_work' => 'Самостоятельная работа',
						'essay' => 'Реферат',
					));
		?>
		<?php echo $form->error($model,'checkpoint'); ?>
	</div>


	<div class="row buttons">
		<?php echo CHtml::submitButton('Подтвердить'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->