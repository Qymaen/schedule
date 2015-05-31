<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>

<div class="container">
	<div class="content">
		<h2 class="title">Добро пожаловать!</h2>
		<div class="description">
			<p>Расписание создано с целью облегчения получения последней информации о расписании. Благодаря мобильным оповещениям, Вы всегда будете в курсе последних событий!</p>
		</div>
		<div id="schedule_menu">
			<?php $this->widget('zii.widgets.CMenu',array(
				'items'=>array(
					array('label'=>'Перейти к расписанию', 'url'=>array('/schedule/schedule')),
				),
			)); ?>
		</div>
	</div>
</div>