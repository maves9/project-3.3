<?php
include "userID_login.php";//Demontration of the id a user logged in on
include 'db_local_env.php'; //returns db_connect();
$connect = db_connect();
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Profile</title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>

    <?php include "login_status.php";

    $profileID = $_GET['id'];

    $sql = 'SELECT * FROM profiles WHERE id = :profileID';

    $stmt = $connect->prepare($sql);

    $stmt->bindParam(':profileID', $profileID);

    $stmt->execute();


    ?>
    <main>

    <?php while ($row = $stmt->fetch()):

      if ($profileID == $userID) {
        ?>
        <a href="update/profile_edit?<?php echo 'profileID='.$profileID.'&username='.$row["username"].'&age='.$row["age"]. '&email='. $row["email"].'&superpower='. $row["super_power"].'&nemisis='.$row["nemisis"].'&description='.$row["description"] ?>">Update profile</a>

        <?php  }?>

    <h1><?php echo $row["username"]; ?></h1>
    <hr>
    <p><strong>Age: </strong><?php echo $row["age"]; ?></p>

    <p><strong>Email: </strong><?php echo $row["email"]; ?></p>

    <p><strong>Superpower: </strong><?php echo $row["super_power"]; ?></p>

    <p><strong>Nemisis: </strong><?php echo $row["nemisis"]; ?></p>

    <p><strong>Description: </strong><?php echo $row["description"]; ?></p>
  <?php endwhile;?>

<p><strong>followers: </strong>
  <?php
  $giftSQL = 'SELECT COUNT(*) FROM follower WHERE to_ID= :profileID';

  $stmt = $connect->prepare($giftSQL);
  $stmt->bindParam(':profileID', $profileID);
  $stmt->execute();

  echo $stmt->fetch()['COUNT(*)'];

  ?>
</p>

<p><strong>Gifts recived: </strong>
<?php


$giftSQL = 'SELECT COUNT(*), name, to_ID, picture_name FROM `gift` WHERE to_ID=:profileID GROUP BY name, picture_name';

$stmt = $connect->prepare($giftSQL);
$stmt->bindParam(':profileID', $profileID);
$stmt->execute();
$giftRow = $stmt->fetch();
echo $giftRow ['COUNT(*)'];
echo '<br>gift name: '.$giftRow['name'];

?>
</p>
<img src="img/<?php echo $giftRow['picture_name'];  ?>"  height="200" alt="">
  <?php

      $followerSQL = 'SELECT `to_ID` FROM `follower` WHERE to_ID = :profileID';

      $stmt = $connect->prepare($followerSQL);
      $stmt->bindParam(':profileID', $profileID);
      $stmt->execute();
      $follower = $stmt->fetch();

      if ($follower['to_ID'] !== null) {
      ?>

      <a href="create/gift.php?to_ID=<?php echo $profileID?>">Send a gift</a>

      <?php }else { ?>
              <a href="create/follower.php?to_ID=<?php echo $profileID?>">follow</a>
      <?php }  ?>

    <a href="private_message.php?to_ID=<?php echo $profileID?>">Send a private message</a>

    <a href="comunity.php">Find people</a>

    <hr>

    <h3>Comments</h3>
    <?php if (isset($userID)) {?>

      <form class="form" action="create/comment.php" method="get">

        <textarea name="message" rows="8" cols="40"></textarea>

        <input type="hidden" name="to_ID" value="<?php echo $profileID;?>">

        <input type="submit" name="submit" value="comment">

      </form>

    <?php }

    $commentSQL = 'SELECT profiles.username, profiles.id, comment.from_ID, comment.message, comment.to_ID, comment.id AS comment_id
    FROM `profiles`
    INNER JOIN comment ON profiles.id = comment.from_ID
    WHERE to_ID = :profileID';

    $stmt = $connect->prepare($commentSQL);

    $stmt->bindParam(':profileID', $profileID);

    $stmt->execute();

    while ($commentRow = $stmt->fetch()):
    ?>
    <hr>
    <h3>from:  <a href="profile?id=<?php echo $commentRow["from_ID"]; ?>">
       <?php echo $commentRow["username"]; ?>
    </a></h3>
    <p><?php echo $commentRow["message"]; ?> </p> <small><a href="update/comment_edit.php?id=<?php echo $commentRow["comment_id"]. '&profileID='.$profileID; ?>">Update</a>
     <a href="delete/comment.php?id=<?php echo $commentRow["comment_id"]. '&profileID='.$profileID; ?>">Delete</a></small>



    <?php endwhile; ?>
    </main>
  </body>
</html>
