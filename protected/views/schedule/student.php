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
            <?php foreach ($lessons as $number => $lesson) : ?>
              <?php if (isset($lesson['empty'])) : ?>
                <div class="lesson_empty lesson_container">---</div>
              <?php else : ?>
                <div class="lesson_container">
                  <div class="lesson_content_<?php echo $lesson[0]['week_type']; ?>">
                    <span class="lesson_title"><?php echo $lesson[0]['title']; ?></span>
                    <span class="lesson_classroom"><?php echo $lesson[0]['classroom']; ?></span>
                    <?php if ($lesson[0]['week_type'] !== 'both') : ?>
                      <span class="lesson_week_type">
                        <?php echo ($lesson[0]['week_type'] == 'even') ? '/' : '*'; ?>
                      </span>
                    <?php endif; ?>
                  </div>
                  <?php if (!empty($lesson[1])) : ?>
                    <div class="lesson_content_<?php echo $lesson[1]['week_type']; ?>">
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
              <?php endif; ?>
            <?php endforeach; ?>
          </td>
        <?php endforeach; ?>
      </tr>
    </table>
  <?php endif; ?>
  
</div>