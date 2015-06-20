<?php
/* @var $this DiplomaController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Дипломирование',
);

$this->menu=array(
	array('label'=>'Учет качества Дипломирования', 'url'=>array('quality')),
	array('label'=>'Запись на Дипломирование', 'url'=>array('create')),
	array('label'=>'Управление Дипломированием', 'url'=>array('admin')),
	array('label'=>'Список Дипломирования', 'url'=>array('index')),
);
?>

<h1>Учет качества дипломирования</h1>

<?php if ($params['group']) : ?>
	<span class="quality_group_title">
		Группа: <?php echo $groups[$params['group']]; ?><?php if ($params['year']) echo ','; ?>
	</span>
<?php endif; ?>

<?php if ($params['year']) : ?>
	<span class="quality_year_title">Год: <?php echo $params['year']; ?></span>
<?php endif; ?>

<div class="quality_diploma_wrapper">
	<div class="quality_diploma_list_wrapper">
		<?php $this->widget('zii.widgets.grid.CGridView', array(
			'dataProvider' => $dataProvider,
			'template' => '{items}{pager}',
			'columns' => array(
				array('header' => 'Направление', 'value' => '$data[\'diploma_direction_type\']'),
				array('header' => 'Средняя оценка', 'value' => '$data[\'avg_rating\']'),
			),
		)); ?>
	</div>
	
	<div class="quality_diploma_search_form_wrapper">
		<div class="form">
			
			<?php $form = $this->beginWidget('CActiveForm', array(
				'id' => 'diploma-quality-form',
				'method' => 'get',
				'action' => $this->createUrl('diploma/quality'),
				'enableAjaxValidation' => false,
			)); ?>
				
				<div class="diploma_search_container">
					
					<div class="diploma_search_year">
						<?php $year = date('Y'); ?>
						<span>Год:</span>
						<select name="year">
							<option value=""></option>
							<option value="<?php echo $year; ?>"><?php echo $year; ?></option>
							<option value="<?php echo $year - 1; ?>"><?php echo $year - 1; ?></option>
							<option value="<?php echo $year - 2; ?>"><?php echo $year - 2; ?></option>
							<option value="<?php echo $year - 3; ?>"><?php echo $year - 3; ?></option>
							<option value="<?php echo $year - 4; ?>"><?php echo $year - 4; ?></option>
							<option value="<?php echo $year - 5; ?>"><?php echo $year - 5; ?></option>
						</select>
					</div>
					
					<div class="diploma_search_group">
						<span>Группа:</span>
						<select name="group">
							<?php foreach ($groups as $id => $group) : ?>
								<option value="<?php echo $id; ?>"><?php echo $group; ?></option>
							<?php endforeach; ?>
						</select>
					</div>
					
					<div class="row buttons">
						<?php echo CHtml::submitButton('Найти!'); ?>
					</div>
				
				</div>
			<?php $this->endWidget(); ?>
		</div><!-- form -->
		
	</div>
	<div class="quality_diploma_graph_wrapper">
		<div class="quality_diploma_graph_popularDiplomaDirectionTypes">
			<span class="quality_diploma_graph_title">Популярная оценка</span>
			<?php 
        $this->widget(
					'chartjs.widgets.ChBars', array(
						'width' => 300,
						'height' => 100,
						'htmlOptions' => array(),
						'labels' => array("Пятерка","Четверка","Тройка"),
						'datasets' => array(
								array(
										"fillColor" => "rgba(151,187,205,0.6)",
										"strokeColor" => "rgba(220,220,220,0.8)",
										"data" => $popularRatings
								)       
						),
						'options' => array()
					)
        ); 
			?>
		</div>
		<div class="quality_diploma_graph_popularRatings">
			<span class="quality_diploma_graph_title">Популярное направление</span>
			<?php 
				$this->widget('chartjs.widgets.ChPie', array(
					'width' => 300,
					'height' => 200,
					'htmlOptions' => array(),
					'drawLabels' => true,
					'datasets' => array(
							array(
									"value" => (int) $popularDiplomaDirectionTypes[1]['value'],
									"color" => "rgba(220,30, 70,1)",
									"label" => 'Web-разработка',
							),
							array(
									"value" => (int) $popularDiplomaDirectionTypes[2]['value'],
									"color" => "rgba(66,66,66,1)",
									"label" => 'СППР',
							),
							array(
									"value" => (int) $popularDiplomaDirectionTypes[3]['value'],
									"color" => "rgba(100,100,220,1)",
									"label" => 'ИС',
							)
					),
					'options' => array()
				)); 
      ?>
		</div>
	</div>
</div>