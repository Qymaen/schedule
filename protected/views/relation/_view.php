<?php
/* @var $this RelationController */
/* @var $data Relation */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('lesson_id')); ?>:</b>
	<?php echo CHtml::encode($data->lesson_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('group_id')); ?>:</b>
	<?php echo CHtml::encode($data->group_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('user_id')); ?>:</b>
	<?php echo CHtml::encode($data->user_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('trimester')); ?>:</b>
	<?php echo CHtml::encode($data->trimester); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('classroom')); ?>:</b>
	<?php echo CHtml::encode($data->classroom); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('day_of_week')); ?>:</b>
	<?php echo CHtml::encode($data->day_of_week); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('week_type')); ?>:</b>
	<?php echo CHtml::encode($data->week_type); ?>
	<br />

	*/ ?>

</div>