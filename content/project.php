<!--  сделать слайдер -->
<ul class="project-list">
   <li class="project-row ">Задача: <span class="red"><?php echo htmlspecialchars($project['task']) ?></span></li>
    <?php showProjectSlider($project['slider'],$project['href']); ?>
  <li class="project-row mt20">непосредственно разроботка(ход работы)</li>
   <li class="project__text-desc-work">
     <?php echo  $project['devtext'];?>
   </li>
   <li class="project-row">вложение(файлы)</li>
   <li class="project__attachment">
     <?php jsonInputDataToHtml2($project['attachment']); ?>
   </li>
   <li class="project-row">потраченно времени:</li>
   <li class="project__wasted-time">
            <?php $wtime =json_decode($project['wasted-time'],true) ?>
      <ul class="project__wasted-time-list">
         <li class="project__wasted-time-item">
            около <?php echo $wtime['front'] ?>ч на front-end
         </li>
         <li class="project__wasted-time-item">
            около <?php echo $wtime['back'] ?>ч на back-end
         </li>
         <li class="project__wasted-time-item">
            всего <?php echo $wtime['all'] ?>ч часов
         </li>
      </ul>
   </li>
   <li class="project-row">мое мнение о проекте</li>
   <li class="project__my-opinion maxsize450 mcenter">
      <?php echo htmlspecialchars($project['opinion']); ?>
   </li>
   <li class="project-row mt20">правки</li>
   <li class="project__revisions maxsize450 mcenter">
      <?php 
      if($project['revisions'] != '' ){ 
          echo htmlspecialchars($project['revisions']);
      }else{
        echo 'покачто нету и надеюсь и не будут!!!';
        echo "\n";
     } ?>
   </li>
</ul>