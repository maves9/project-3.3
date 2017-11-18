<?php
 include "../userID_login.php";//Demontration of a user that is logged in
 include '../db_local_env.php';
 $connect = db_connect();

 // insert a row
 $username = $_GET['username'];
 $nemisis = $_GET['nemisis'];
 $email = $_GET['email'];
 $superpower = $_GET['superpower'];
 $age = $_GET['age'];
 $description = $_GET['description'];

$profileID = $_GET['profileID'];
 if ($userID != $profileID){
   echo "Access denied";
   die();
 }else{
   # code...

 ?>

 <!DOCTYPE html>
 <html>
   <head>

     <meta charset="utf-8">
     <title>Update</title>

   </head>
   <body>

       <form action="profile_update.php" method="POST">

         <p><label for="email">E-mail</label></p>
         <p><input type="text" name="email" value="<?php echo $email; ?>"></p>

         <p><label for="username">username</label></p>
         <p><input type="text" name="username" value="<?php echo $username; ?>"></p>

         <p><label for="superpower">superpower</label></p>
         <p><input type="text" name="superpower" value="<?php echo $superpower; ?>"></p>

         <p><label for="nemisis">nemisis</label></p>
         <p><input type="text" name="nemisis" value="<?php echo $nemisis; ?>"></p>

         <p><label for="age">age</label></p>
         <p><input type="text" name="age" min="18" value="<?php echo $age; ?>"></p>

         <p><label for="description">Description (optional)</label></p>
         <textarea name="description" rows="8" cols="80"><?php echo $description; ?></textarea>

         <input type="hidden" name="profileID" value="<?php echo $profileID; ?>">

         <button type="submit" name="button">update</button>

       </form>

<?php  } ?>
   </body>
 </html>
 <?php db_connect_close($connect); ?>
