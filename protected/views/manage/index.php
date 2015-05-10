<?php
/* @var $this ManageController */

$this->breadcrumbs=array(
	'Управление',
);
?>

<div class="container">
	<div class="content">
		<h2 class="title">Управление</h2>
		<div class="description">
			<p>Здесь вы можете создавать, редактировать и удалять необходимые вам сущности.</p>
		</div>
		<div class="schedule_manage_container">
			<?php $this->widget('zii.widgets.CMenu',array(
				'items'=>array(
					array('label'=>'Управление пользователями', 'url'=>array('/user')),
					array('label'=>'Управление группами', 'url'=>array('/group')),
					array('label'=>'Управление предметами', 'url'=>array('/lesson')),
				),
			)); ?>
		</div>
	</div>
</div>

