<?php
  session_start();
  if(!isset($_SESSION["username"])) {
      header("Location: login.php");
      exit();
  }
?>

<?php include "include/header.php"?>


<h1>Success!</h1>
  <p>Your data has been inserted successfully.</p>
  <a href="index.php"><button type="submit" name="submit">Terug naar Home</button></a>


<?php include "include/footer.php"







?>


