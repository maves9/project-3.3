<?php
if (isset($connect) && isset($userID)) {

  $statusSQL = 'SELECT * FROM profiles WHERE id = :userID';
  $stmt = $connect->prepare($statusSQL);
  $stmt->bindParam(':userID', $userID);

  $stmt->execute();

  $result = $stmt->fetch();

 ?>

 <p>you are logged in as: <a href="profile?id=<?php echo $userID; ?>"><?php echo $result["username"]; ?></a></p>
<?php }else {?>

<p>you are not logged in</p>

<?php }?>
<hr>
