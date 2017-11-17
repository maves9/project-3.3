<?php
 include "../userID_login.php";//Demontration of a user that is logged in
 include '../db_local_env.php';
 $connect = db_connect();

 $commentID = $_GET['id'];
 $profileID = $_GET['profileID'];

 $sql = 'SELECT * FROM comment WHERE id='.$commentID;

 $stmt = $connect->prepare($sql);

 $stmt->execute();
 
 if ($userID != $profileID) {
   echo "Access denied";
   die();
 }
 ?>

 <!DOCTYPE html>
 <html>
   <head>

     <meta charset="utf-8">
     <title>Update</title>

   </head>
   <body>

     <?php while ($row = $stmt->fetch()): ?>
       <form action="comment_update.php" method="get" enctype="multipart/form-data">
         <article class="post">

           <label for="message">Message:</label>
           <input type="text" name="message" value="<?php echo $row["message"]; ?>">

           <input type="hidden" name="id" value=<?php echo $row['id'];?>>
           <input type="hidden" name="profileID" value=<?php echo $profileID;?>>

           <input type="submit" name="" value="Done">

         </article>
       </form>

     <?php endwhile; ?>

   </body>
 </html>
 <?php db_connect_close($connect); ?>
