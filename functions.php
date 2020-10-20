<?php

function get_header($filename = 'header.php')
{
  global $project; // https://www.php.net/manual/ru/language.variables.scope.php
  if($filename != 'header.php')
  {
    $filename = 'header-' .$filename. '.php';
  }
  $filename = $_SERVER['DOCUMENT_ROOT'] .'/'. $filename;
  if(file_exists($filename))
  {
    require($filename);
  }
  else{
    die("$filename does`t exist!!!");
  }
}


function get_footer($filename = 'footer.php')
{
  $filename = $_SERVER['DOCUMENT_ROOT'] .'/'. $filename;
  if(file_exists($filename))
  {
    require($filename);
  }
}

function get_content($filename )
{
   global $project; // https://www.php.net/manual/ru/language.variables.scope.php
  $filename = $_SERVER['DOCUMENT_ROOT'] .'/'.'content/' . $filename;
  if(file_exists($filename))
  {
     require_once($filename);
  }
  else
  {
     die($filename . " does`t exist please check filename");
  }
}

function reqdb($driver,$host,$dbname,$login,$pass)
{
     $dblocation = __DIR__ . '/db/db.php';
     if( file_exists($dblocation) )
     {
       require($dblocation);
     }
     else
     {
      die($dblocation . " does`t exist please check your db files");
     }
}

function getDirContents($dir, &$results = array()) {
    $files = scandir($dir);

    foreach ($files as $key => $value) {
        $path = realpath($dir . DIRECTORY_SEPARATOR . $value);
        if (!is_dir($path)) {
            $results[] = $path;
        } else if ($value != "." && $value != "..") {
            getDirContents($path, $results);
        }
    }

    return $results;
}


function createFileInGithub($file,$wayToFile)
{
$file = str_replace('\\', "/", $file);// fuck fuck fuck
$ch = curl_init();
$content = file_get_contents($wayToFile);
$content = base64_encode($content);
$auth = 'Authorization: token 19b21b4312916ccc028ea4659243ed81e70699fa';
curl_setopt($ch, CURLOPT_URL, "https://api.github.com/repos/Max-Vysotsky/example/contents/$file");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');

$payload = '
{
  "message": "my commit message",
  "committer": {
    "name": "Max-Vysotsky",
    "email": "mr.magic.strength@yandex.ru"
  },
  "content": "'.$content.'"
}
 ';
 $headers = array();
$headers[] = 'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/84.0.4147.125 Safari/537.36';
$headers[] = $auth;
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
 curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers );

$result = curl_exec($ch);
if (curl_errno($ch)) {
    echo 'Error:' . curl_error($ch);
    die();
}
curl_close($ch);

}