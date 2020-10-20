<?php require('myblog-functions.php'); ?>
<?php 

  reqdb('mysql','127.0.0.1','myblog','root','toor'); 
  $rows =     R::getAll( 'SELECT * FROM projects order by `id` DESC' ); 
  $iterator = 1;
  foreach ($rows as $key => $project) {

  $href = $project['href'];
?>
<?php if($iterator % 4 == 0 ){ ?>
  </div>
  <?php } ?>

<?php if($iterator % 4 == 0 || $iterator == 1){ ?>
<div class="flex-row">

  <?php } ?>

 <article class="project"  >
  <header class="project__header">
    <div class="project__desc">
      <div class="project__name"><a href="project.php?href=<?php echo $project['href'] ?>"><?php echo $project['title'] ?></a></div>
      <div class="project__technolodgi-set">

        <?php textToHtmlTechology($project['techology']); ?>

      </div>
      <div class="project__price"><?php echo $project['price'] ?> $</div>
    </div>
  </header>
  <main class="project__shorttext">
    <?php 
      $string = strip_tags($project['shortdesc']);
    if (strlen($string) > 500) {

        // truncate string
        $stringCut = substr($string, 0, 500);
        $endPoint = strrpos($stringCut, ' ');

        //if the string doesn't contain any space then it will cut without word basis.
        $string = $endPoint? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
        $string .= "... <a href=\"project.php?href=$href\">Read More</a>";
    }
    echo $string;
    ?>

  </main>
</article>

<?php $iterator++; if(count($rows) == 1) {echo '</div>';} ?>


<?php
 if($iterator == 9)
    {
      break;
      
    }
  }