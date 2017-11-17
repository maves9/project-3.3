<?php
include "userID_login.php";
include 'db_local_env.php';
$connect = db_connect();

$query = $_GET['query'];
 ?>

 <!DOCTYPE html>
 <html>
   <head>
     <meta charset="utf-8">
     <title>demo</title>
     <link rel="stylesheet" href="style.css">

   </head>
   <body>
     <?php include "login_status.php"; ?>
     <main>

     <h1>welcome to the comunity page</h1>
     <p>here's a list over our users:</p>


     <form action="search.php" method="get">
         <input type="text" name="query" placeholder="search">
         <button type="submit" name="button">GO</button>
     </form>

     <?php
     $sql = "SELECT *
             FROM profiles
             WHERE UPPER(username) LIKE UPPER('%".$query."%')";

     $stmt = $connect->prepare($sql);

     $stmt->execute();
     if(empty($query)){
       echo "<p>no results</p>";
     }else {
    ?><p>Results for: <?php echo $query; ?></p>

    <?php
     while ($row = $stmt->fetch()):?>
         <hr>
         <a href="profile.php?id=<?php echo $row["id"];?>"><h3><?php echo $row["username"]; ?></h3></a>

     <?php endwhile; } ?>


   </main>
   </body>
 </html>
