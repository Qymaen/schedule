<div class="schedule_container">
  
  <?php if (!$schedules) : ?>
    <div class="schedule_empty">
      <span class="schedule_description">
        <p>Расписание отсутствует.</p>
      </span>
    </div>
  <?php else : ?>
    <ul class="schedule_list">
      <?php $skipNext = false; ?>
      <?php foreach ($schedulesDays as $scheduleDay) : ?>
        
        <?php for ($i = 0; $i < 6; $i++) : ?>
          <?php if ($skipNext) { $skipNext = false; continue; } ?>
          <?php if (!@$scheduleDay[$i]) : ?>
            <li class="schedule_item_empty"></li>
          <?php else : ?>
            <li class="schedule_item">
              <?php // if only one lesson at that time ?>
              <?php if ($scheduleDay[$i]['week_type'] === 'both') : ?>
                <span class="lesson_title">
                  <?php echo $scheduleDay[$i]['title']; ?>
                </span>
                <span class="lesson_type">
                  <?php echo $scheduleDay[$i]['type']; ?>
                </span>
                <span class="lesson_classroom">
                  <?php echo $scheduleDay[$i]['lesson_classroom']; ?>
                </span>
              <?php // if more than one lesson ?>
              <?php else : ?>
                <?php if (@isset($scheduleDay[$i + 1]['lesson_number']) and
                          ($scheduleDay[$i]['lesson_number'] == $scheduleDay[$i + 1]['lesson_number'])) : ?>
                  <span class="lesson_title <?php echo $scheduleDay[$i]['week_type']; ?>">
                    <?php echo $scheduleDay[$i]['title']; ?>
                  </span>
                  
                  <span class="lesson_type">
                    <?php echo $scheduleDay[$i]['type']; ?>
                  </span>
                  
                  <span class="lesson_classroom">
                    <?php echo $scheduleDay[$i]['lesson_classroom']; ?>
                  </span>
                  
                  <span class="lesson_week_type">
                    <?php echo $scheduleDay[$i]['week_type']; ?>
                  </span>
                  
                  <span class="lesson_title <?php echo $scheduleDay[$i]['week_type']; ?>">
                    <?php echo $scheduleDay[$i + 1]['title']; ?>
                  </span>
                  
                  <span class="lesson_type">
                    <?php echo $scheduleDay[$i]['type']; ?>
                  </span>
                  
                  <span class="lesson_classroom">
                    <?php echo $scheduleDay[$i]['lesson_classroom']; ?>
                  </span>
                  
                  <span class="lesson_week_type">
                    <?php echo $scheduleDay[$i]['week_type']; ?>
                  </span>
                  <?php $skipNext = true; ?>
                <?php else : ?>
                  <span class="lesson_empty"></span>
                <?php endif; ?>
              <?php endif; ?>
            </li>
          <?php endif; ?>
        <?php endfor; ?>
        
        
        
        
        
      <?php endforeach; ?>
    </ul>
  <?php endif; ?>
  
</div>