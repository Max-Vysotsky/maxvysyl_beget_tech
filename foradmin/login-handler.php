<?php 


if( isset($_POST['login']) && isset($_POST['pass']) )
{
 require('../myblog-functions.php'); 
 require('../functions.php'); 
   reqdb('mysql','127.0.0.1','maxvysnt_myblog','maxvysnt_myblog','z7*MxwLM'); 
  $login = $_POST['login'];
  $pass = $_POST['pass'];
   $admin  = R::find( 'admin', 'login = ? and pass = ?',array($login,$pass));
   $admin  = array_shift($admin);
   if(empty($admin))
   {
    header("Location: /");
   }
   $admin  = $admin->export();
   if(isset($admin['adminID']))
   {
     setcookie("adminID", $admin['adminID'], time()+3600*24);
    header("Location: /foradmin");
   }
}