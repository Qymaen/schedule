<?php
/* @var $this RelationController */
/* @var $model Relation */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'relation-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'lesson_id'); ?>
		<?php echo $form->textField($model,'lesson_id'); ?>
		<?php echo $form->error($model,'lesson_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'group_id'); ?>
		<?php echo $form->textField($model,'group_id'); ?>
		<?php echo $form->error($model,'group_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'user_id'); ?>
		<?php echo $form->textField($model,'user_id'); ?>
		<?php echo $form->error($model,'user_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'trimester'); ?>
		<?php echo $form->textField($model,'trimester',array('size'=>1,'maxlength'=>1)); ?>
		<?php echo $form->error($model,'trimester'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'classroom'); ?>
		<?php echo $form->textField($model,'classroom',array('size'=>60,'maxlength'=>64)); ?>
		<?php echo $form->error($model,'classroom'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'day_of_week'); ?>
		<?php echo $form->textField($model,'day_of_week',array('size'=>9,'maxlength'=>9)); ?>
		<?php echo $form->error($model,'day_of_week'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'week_type'); ?>
		<?php echo $form->textField($model,'week_type',array('size'=>4,'maxlength'=>4)); ?>
		<?php echo $form->error($model,'week_type'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->