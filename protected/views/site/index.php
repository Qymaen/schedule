<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>

<div class="container">
	<div class="content">
		<h2 class="title">Добро пожаловать!</h2>
		<div class="description">
			<p>Web-приложение создано с целью облегчения получения информации об учёте успеваемости студентов. Благодаря мобильным оповещениям, Вы всегда будете в курсе последних событий!</p>
		</div>
		<div id="schedule_menu">
			<?php $this->widget('zii.widgets.CMenu',array(
				'items'=>array(
					array('label'=>'Перейти к системе "Учет успеваемости"', 'url'=>array('/site')),
				),
			)); ?>
		</div>
	</div>
</div>