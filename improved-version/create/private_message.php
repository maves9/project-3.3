<?php
include "../userID_login.php"; //Demontration of a user that is logged in
include '../db_local_env.php';
$connect = db_connect();

$message = $_GET['message'];
$senders_ID = $userID;
$reciver_ID = $_GET['to_ID'];

try {

  $pm = $connect->prepare(
  'INSERT INTO `private_message`(`senders_ID`, `message`, `id`, `reciver_ID`)
  VALUES (:senders_ID, :message, NULL,:reciver_ID );
  '
  );
  $pm->bindParam(':message', $message);
  $pm->bindParam(':senders_ID', $senders_ID);
  $pm->bindParam(':reciver_ID', $reciver_ID);
  $pm->execute();

  $msgID = $connect->prepare('SELECT id FROM `private_message` ORDER by id DESC LIMIT 1');
  $msgID->execute();
  $message_ID = $msgID->fetch()['id'];

  $chatroom = $connect->prepare(
    'INSERT INTO `chatroom`(`id`,`profile_ID`, `message_ID`)
    VALUES (NULL, :profile_ID,:message_ID)');
  $chatroom->bindParam(':profile_ID', $senders_ID);
  $chatroom->bindParam(':message_ID', $message_ID);
  $chatroom->execute();

}

catch(PDOException $e){
echo "Error: " . $e->getMessage();
}

header('location:../private_message.php?to_ID='.$reciver_ID)

 ?>
