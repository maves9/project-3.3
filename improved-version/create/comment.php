<?php
include "../userID_login.php";//Demontration of a user that is logged in
include '../db_local_env.php';

$message = $_GET['message'];
$connect = db_connect();

$from_ID = $userID;
$to_ID = $_GET['to_ID'];


try {
  // prepare sql and bind parameters
  $stmt = $connect->prepare('
    INSERT INTO `comment`(`id`,`from_ID`,  `message`, `to_ID`)
    VALUES (NULL, :from_ID, :message, :to_ID)
    ');

  $stmt->bindParam(':message', $message);
  $stmt->bindParam(':from_ID', $from_ID);
  $stmt->bindParam(':to_ID', $to_ID);


  $stmt->execute();

}

catch(PDOException $e){
echo "Error: " . $e->getMessage();
}

header('location:../profile.php?id='.$to_ID)

 ?>
