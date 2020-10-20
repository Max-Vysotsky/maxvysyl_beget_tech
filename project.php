<?php require('functions.php'); 
 require('myblog-functions.php'); 

if(isset($_GET['href']))
{
  reqdb('mysql','127.0.0.1','myblog','root','toor'); 
  $project =     R::getAll( 'SELECT * FROM projects WHERE `href` = ?', array($_GET['href']) ); 
  if(empty($project))
  {
    die;
  }
  $project = array_shift($project);
?>

<?php get_header('project') ?>
        <div class="main__box project-item ">
            <?php get_content('project.php'); ?>
        </div>
<?php   get_footer(); ?>

<?php } ?>