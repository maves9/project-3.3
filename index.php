<?php
include "userID_login.php";
include 'db_local_env.php';
$connect = db_connect();
 ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Welcome</title>
        <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <main>
      <h1 style="text-align:center">Welcome to super dating</h1>
      <p style="text-align:center">    <a href="comunity.php">Let's get started</a></p>
      <hr>
      <h1>Sign up</h1>

      <form action="create/profile.php" method="POST">

        <p><label for="email">E-mail</label></p>
        <p><input type="text" name="email"></p>

        <p><label for="username">username</label></p>
        <p><input type="text" name="username"></p>

        <p><label for="password">password</label></p>
        <p><input type="password" name="password"></p>

        <p><label for="superpower">superpower</label></p>
        <p><input type="text" name="superpower"></p>

        <p><label for="nemisis">nemisis</label></p>
        <p><input type="text" name="nemisis"></p>

        <p><label for="age">age</label></p>
        <p><input type="text" name="age" min="18"></p>

        <p><label for="description">Description (optional)</label></p>
        <textarea name="description" rows="8" cols="80"></textarea>

        <button type="submit" name="button">Sign up</button>

      </form>
    </main>



  </body>
</html>
