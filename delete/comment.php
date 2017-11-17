<?php
include "../userID_login.php";//Demontration of a user that is logged in
include '../db_local_env.php';
$connect = db_connect();
$profileID = $_GET['profileID'];

if ($userID != $profileID) {
  echo "Access denied";
  die();
}
try {
  if(isset($_GET['id'])){

   $sql_query='DELETE FROM comment WHERE id='.$_GET['id'];

   $stmt = $connect->prepare($sql_query);
   $stmt->execute();
   header('Location:../profile.php?id='.$profileID);
  }
}

catch(PDOException $e){
echo "Error: " . $e->getMessage();
}

$connect = null;



 ?>
