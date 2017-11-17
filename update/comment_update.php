<?php
 include "../userID_login.php";//Demontration of a user that is logged in
include '../db_local_env.php';
$connect = db_connect();

// insert a row
$profileID = $_GET['profileID'];
$message = $_GET['message'];
$id = $_GET['id'];

if ($userID != $profileID) {
  echo "Access denied";
  die();
}

try {

  $sql = 'UPDATE comment SET message=:message WHERE id=:id';

  $stmt = $connect->prepare($sql);

  $stmt->bindparam(':id', $id);
  $stmt->bindparam(':message', $message);

$stmt->execute();
//var_dump($_GET['id']);
//Send to a new page
header('Location:../profile.php?id='.$profileID);
}

catch(PDOException $e){
echo "Error: " . $e->getMessage();
}

$connect = null;
?>
