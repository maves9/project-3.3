<?php
include "../userID_login.php"; //Demontration of a user that is logged in
include '../db_local_env.php';

$message = $_GET['message'];
$connect = db_connect();

$from_ID = $userID;
$to_ID = $_GET['to_ID'];

$name = 'super squerl';
$picture_name = 'gift.jpg';

try {
  // prepare sql and bind parameters
  $stmt = $connect->prepare('
    INSERT INTO `gift`(`from_ID`, `to_ID`, `name`, `picture_name`)
    VALUES (:from_ID, :to_ID, :name, :picture_name)
    ');
  $stmt->bindParam(':from_ID', $from_ID);
  $stmt->bindParam(':to_ID', $to_ID);
  $stmt->bindParam(':name', $name);
  $stmt->bindParam(':picture_name', $picture_name);


  $stmt->execute();

}

catch(PDOException $e){
echo "Error: " . $e->getMessage();
}

header('location:../profile.php?id='.$to_ID)
 ?>
