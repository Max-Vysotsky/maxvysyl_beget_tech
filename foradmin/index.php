<?php require_once('../functions.php'); 
$getin = false;
if(isset($_COOKIE["adminID"]) ){
 require_once('../functions.php'); 
    reqdb('mysql','127.0.0.1','maxvysyl_blog','maxvysyl_blog','2gyvo%C5'); 
   $admin  = R::find( 'admin', 'adminID = ? ',array($_COOKIE["adminID"]));
    if(!empty($admin))
   {
    $getin = true;
   }
}
?>
<?php get_header('admin') ?>
        <div class="main__box project-item ">
          <?php if(isset($_GET['alert'])){
            echo '<div class="admin__error">';
            echo htmlspecialchars($_GET['alert']);
            echo '</div>';
          } ?>
            <?php if($getin == true ){ 
                    get_content('admin-core.php'); 
                      }else{ 
                     get_content('admin-login.php'); 
                   } ?>
        </div>
<?php   get_footer(); ?>