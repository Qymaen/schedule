<?php
/* @var $this DeliveryController */

$this->breadcrumbs=array(
	'СМС рассылка',
);
?>

<?php if (!empty($status)) : ?>
	<div class="message_container tip">
		<span class="message_text"><?php echo $message; ?></span>
	</div>
<?php else : ?>
	<div class="form">
		<?php $form = $this->beginWidget('CActiveForm', array(
			'id' => 'delivery-index-form',
			'method' => 'post',
			'action' => $this->createUrl('delivery/index'),
			'enableAjaxValidation' => false,
		)); ?>
			
			<?php echo $form->errorSummary($model); ?>
			
			<div class="delivery_container">
				
				<div class="delivery_group_content">
					<span>Группа:</span>
					<select name="group_id">
						<?php foreach ($groups as $id => $group) : ?>
							<option value="<?php echo $id; ?>"><?php echo $group; ?></option>
						<?php endforeach; ?>
					</select>
				</div>
				
				<div class="delivery_message_content">
					<textarea name="message"
										placeholder="Введите сообщение для группы.
											Сообщение ограничено длинной в 70 символов."
										required
										rows="10"
										cols="50"
										maxlength="70"></textarea>
				</div>
				
				<div class="row buttons">
					<?php echo CHtml::submitButton('Отправить!'); ?>
				</div>
			
			</div>
		
		<?php $this->endWidget(); ?>
	</div><!-- form -->
<?php endif; ?>