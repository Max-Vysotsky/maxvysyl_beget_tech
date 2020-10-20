<?php
require_once('../functions.php'); 






// here must be is statement but I want to sleep fuck this
if(isset($_COOKIE["adminID"] ) ){
  reqdb('mysql','127.0.0.1','maxvysyl_blog','maxvysyl_blog','2gyvo%C5'); 
   $admin  = R::find( 'admin', 'adminID = ? ',array($_COOKIE["adminID"]));
   $admin = array_shift($admin);
    if(empty($admin))
   {
    die('who are You?');
   }

$href = $_POST['href'];
   $project  = R::find( 'projects', 'href = ? ',array($href));
    $project  = array_shift($project);
    if(!is_null($project))
    {
      $project = $project->export();
    }
    if(!empty($project))
   {
    header("Location: /foradmin/?alert=данный url уже существует");
   }
$slider = (int) $_POST['slider'];
    if($slider != 0)
    {
        $countfiles = count($_FILES['images']['name']);
        $pathToFolder = $_SERVER['DOCUMENT_ROOT'] .'/static/img/project-slider/'.$href;
        if($countfiles != $slider)
        {
           header("Location: /foradmin/?alert=неверное количество слайдов");
          die();
        }
        if(is_dir($pathToFolder))
        {
          $href = htmlspecialchars($href);
          header("Location: /foradmin/?alert=директория с $href ужу сущуствует");
          die();
        }
        mkdir($pathToFolder);
        for($i=1;$i<=$countfiles;$i++){
          $i2 = $i - 1;
          $filename = '/0'.$i.'.jpg';
          // почемуто долго обрабатывает запрос
          move_uploaded_file($_FILES['images']['tmp_name'][$i2],$pathToFolder .''.$filename);
        }
    }

$title = $_POST['title'];
$task = $_POST['task'];
$technology = $_POST['technology'];
$price = $_POST['price'];
$description = $_POST['description'];
$shortdesc = $_POST['shortdesc'];
$devtext = $_POST['devtext'];
$attachment = $_POST['attachment'];
$time = $_POST['wasted-time'];
$opinion = $_POST['opinion'];
$revisions = $_POST['revisions'];

    R::exec( '  INSERT INTO `projects` (`description`, `href`, `task`, `devtext`, `slider`, 
      `attachment`, `wasted-time`, `opinion`, `revisions`, `title`, `techology`, `price`, `shortdesc`)
     VALUES ( ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)', array($description, $href, $task, $devtext,$slider,
     $attachment, $time, $opinion, $revisions, $title, $technology, $price, $shortdesc) );

}
else
{
  die('who are You?');
}