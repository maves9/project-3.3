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
VALUES (:senders_ID, :message, NULL,:reciver_ID )'
);
$pm->bindParam(':message', $message);
$pm->bindParam(':senders_ID', $senders_ID);
$pm->bindParam(':reciver_ID', $reciver_ID);
$pm->execute();

}

catch(PDOException $e){
echo "Error: " . $e->getMessage();
}

header('location:../private_message.php?to_ID='.$to_ID)

 ?>
