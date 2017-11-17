<?php
include "userID_login.php"; //Demontration of a user that is logged in
include 'db_local_env.php';

$connect = db_connect();
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Private message</title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <?php
    include 'login_status.php';

    $from_ID = $userID;
    $to_ID = $_GET['to_ID'];

    $pmSQL = 'SELECT profiles.username, profiles.id, private_message.senders_ID, private_message.message
    FROM `profiles`
    LEFT JOIN private_message ON profiles.id = private_message.senders_ID
    WHERE private_message.senders_ID = :from_ID OR private_message.senders_ID = :to_ID';

    $stmt = $connect->prepare($pmSQL);
    $stmt->bindParam(':from_ID', $from_ID);
    $stmt->bindParam(':to_ID', $to_ID);
    $stmt->execute();
    ?>

    <main>

    <h1>Send message </h1>
    <?php while ($row = $stmt->fetch()):?>

      <p><?php echo $row["message"]; ?>
        <br>
        <small>from: <a href="profile?id=<?php echo $row["id"]; ?>"><?php echo $row["username"]; ?></a></small>
      </p>

    <?php endwhile;?>
    
    <form class="form" action="create/private_message.php" method="get">

      <textarea name="message" rows="8" cols="40"></textarea>

      <input type="hidden" name="to_ID" value="<?php echo $to_ID;?>">

      <input type="submit" name="submit" value="Send">

    </form>
  </main>
  </body>
</html>
