<div class="form">

<?php $form = $this->beginWidget('CActiveForm', array(
	'id' => 'schedule-schedule-form',
  'method' => 'get',
  'action' => $this->createUrl('schedule/schedule'),
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// See class documentation of CActiveForm for details on this,
	// you need to use the performAjaxValidation()-method described there.
	'enableAjaxValidation' => false,
)); ?>
  
  <?php echo $form->errorSummary($model); ?>
  
  <div class="schedule_search_container">
    
    <div class="schedule_search_title">
      <span>Поиск:</span>
    </div>
    
    <div class="schedule_search_course">
      <span>Курс:</span>
      <select name="course">
        <option value="1">Первый</option>
        <option value="2">Второй</option>
        <option value="3">Третий</option>
        <option value="4">Четвертый</option>
        <option value="5">Пятый</option>
      </select>
    </div>
    
    <div class="schedule_search_group">
      <span>Группа:</span>
      <select name="group">
        <?php foreach ($groups as $id => $group) : ?>
          <option value="<?php echo $id; ?>"><?php echo $group; ?></option>
        <?php endforeach; ?>
      </select>
    </div>
    
    <div class="schedule_search_trimester">
      <span>Триместр:</span>
      <select name="trimester">
        <option value="1">Первый</option>
        <option value="2">Второй</option>
        <option value="3">Третий</option>
        <option value="session">Сессия</option>
      </select>
    </div>
    
    <div class="schedule_search_teacher">
      <span>Преподаватель:</span>
      <select name="teacher">
        <?php foreach ($teachers as $id => $teacher) : ?>
          <option value="<?php echo $id; ?>"><?php echo $teacher; ?></option>
        <?php endforeach; ?>
      </select>
    </div>
    
    <div class="row buttons">
      <?php echo CHtml::submitButton('Найти!'); ?>
    </div>
  
  </div>

<?php $this->endWidget(); ?>

</div><!-- form -->

<div class="schedule_container">
  <?php if (!$schedules) : ?>
    <div class="schedule_empty">
      <span class="schedule_description">
        <p>Расписание отсутствует.</p>
      </span>
    </div>
  <?php else : ?>
    <table class="schedule_table">
      <tr class="schedule_thead">
        <?php foreach ($schedulesDays as $day => $lessons) : ?>
          <th><?php echo $daysTranslate[$day]; ?></th>
        <?php endforeach; ?>
      </tr>
      <tr class="schedule_tbody">
        <?php foreach ($schedulesDays as $day => $lessons) : ?>
          <td class="schedule_day <?php echo $day; ?>">
            <?php $counter = 0; ?>
            <?php foreach ($lessons as $number => $lesson) : ?>
              <?php if (isset($lesson['empty'])) : ?>
                <div class="lesson_empty lesson_container">
                  <div class="lesson_number"><?php echo ++$counter . '. '; ?></div>
                  <div class="lesson_info">
                    <span>---</span>
                  </div>
                </div>
              <?php else : ?>
                <div class="lesson_container">
                  <div class="lesson_number"><?php echo ++$counter . '. '; ?></div>
                  <div class="lesson_info">
                    <div class="lesson_content week_type_<?php echo $lesson[0]['week_type']; ?>">
                      <span class="lesson_title"><?php echo $lesson[0]['title']; ?></span>
                      <span class="lesson_classroom"><?php echo $lesson[0]['classroom']; ?></span>
                      <?php if ($lesson[0]['week_type'] !== 'both') : ?>
                        <span class="lesson_week_type">
                          <?php echo ($lesson[0]['week_type'] == 'even') ? '/' : '*'; ?>
                        </span>
                      <?php endif; ?>
                    </div>
                    <?php if (!empty($lesson[1])) : ?>
                      <div class="lesson_content week_type_<?php echo $lesson[1]['week_type']; ?>">
                        <span class="lesson_title"><?php echo $lesson[1]['title']; ?></span>
                        <span class="lesson_classroom"><?php echo $lesson[1]['classroom']; ?></span>
                        <?php if ($lesson[1]['week_type'] !== 'both') : ?>
                          <span class="lesson_week_type">
                            <?php echo ($lesson[1]['week_type'] == 'even') ? '/' : '*'; ?>
                          </span>
                        <?php endif; ?>
                      </div>
                    <?php endif; ?>
                  </div>
                </div>
              <?php endif; ?>
            <?php endforeach; ?>
          </td>
        <?php endforeach; ?>
      </tr>
    </table>
  <?php endif; ?>
</div>