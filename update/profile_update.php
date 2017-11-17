<?php
 include "../userID_login.php";//Demontration of a user that is logged in
include '../db_local_env.php';
$connect = db_connect();

// insert a row
$username = $_POST['username'];
$nemisis = $_POST['nemisis'];
$email = $_POST['email'];
$superpower = $_POST['superpower'];
$age = $_POST['age'];
$description = $_POST['description'];
$profileID = $_POST['profileID'];

if ($userID != $profileID) {
  echo "Access denied";
  die();
}

try {

  $sql = 'UPDATE profiles SET age=:age, email=:email, nemisis=:nemisis, super_power=:superpower, username=:username, description=:description WHERE id=:id';

  $stmt = $connect->prepare($sql);

  $stmt->bindParam(':email', $email);
  $stmt->bindParam(':username', $username);
  //$stmt->bindParam(':password', $password);
  $stmt->bindParam(':age', $age);
  $stmt->bindParam(':nemisis', $nemisis);
  $stmt->bindParam(':description', $description);
  $stmt->bindParam(':superpower', $superpower);
  $stmt->bindParam(':id', $userID);

$stmt->execute();

//Send to a new page
header('Location:../profile.php?id='.$profileID);
}

catch(PDOException $e){
echo "Error: " . $e->getMessage();
}

$connect = null;
?>
