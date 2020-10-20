<?php 
require('rb.php');

$confstring = $driver . ':host=' . $host . ';dbname=' . $dbname;


R::setup( $confstring , $login, $pass );
