<?php
include "../userID_login.php";//Demontration of a user that is logged in
include '../db_local_env.php';
$connect = db_connect();

$username = $_POST['username'];
$nemisis = $_POST['nemisis'];
$password = $_POST['password'];
$email = $_POST['email'];
$superpower = $_POST['superpower'];

if (empty($_POST['description'])) {
  $description = 'no description';
}else {
  $description = $_POST['description'];
}

$age = $_POST['age'];
try {
  // prepare sql and bind parameters
  $stmt = $connect->prepare('INSERT INTO `profiles`(`email`, `username`, `password`, `age`, `nemisis`, `description`, `super_power`, `id`)
    VALUES (:email, :username, :password, :age, :nemisis, :description, :superpower, NULL)
    ');

  $stmt->bindParam(':email', $email);
  $stmt->bindParam(':username', $username);
  $stmt->bindParam(':password', $password);
  $stmt->bindParam(':age', $age);
  $stmt->bindParam(':nemisis', $nemisis);
  $stmt->bindParam(':description', $description);
  $stmt->bindParam(':superpower', $superpower);


  $stmt->execute();
//  header('Location:../comunity.php');

} catch (PDOException $e) {
  echo "Error: " . $e->getMessage();
}

 ?>
