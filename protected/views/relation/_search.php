<?php
/* @var $this RelationController */
/* @var $model Relation */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'lesson_id'); ?>
		<?php echo $form->textField($model,'lesson_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'group_id'); ?>
		<?php echo $form->textField($model,'group_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'user_id'); ?>
		<?php echo $form->textField($model,'user_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'trimester'); ?>
		<?php echo $form->textField($model,'trimester',array('size'=>1,'maxlength'=>1)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'classroom'); ?>
		<?php echo $form->textField($model,'classroom',array('size'=>60,'maxlength'=>64)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'day_of_week'); ?>
		<?php echo $form->textField($model,'day_of_week',array('size'=>9,'maxlength'=>9)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'week_type'); ?>
		<?php echo $form->textField($model,'week_type',array('size'=>4,'maxlength'=>4)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->