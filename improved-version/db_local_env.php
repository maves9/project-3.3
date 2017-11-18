<?php

define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'vestergaard2');
define('DB_NAME', 'super_dating');

function db_connect(){
  $connect = new PDO("mysql:host=".DB_SERVER.";dbname=".DB_NAME, DB_USERNAME, DB_PASSWORD);
  return $connect;
}

function db_connect_close($connect){
  if (isset($connect)) {
      return $connect = null;
  }
}

 ?>
