<?php
  session_start();
  if(!isset($_SESSION["username"])) {
      header("Location: login.php");
      exit();
  }
?>

<<<<<<< HEAD
<form method="post" autocomplete="on" action="progressQuestionForm.php" class="form-question">
=======

<?php 
include "include/header.php";
include "include/navbar.php";
?>


<form method="post" autocomplete="on" action="progress.php">
>>>>>>> 7f9537a7d8216fa00a01ae8cfcafe8f2722aac90
    <h2>Form</h2>
    <input type="text" name="name" id="name" placeholder="naam"><br><br>
    <input type="text" name="lastname" id="lastname" placeholder="lastname"><br><br>
    <textarea type="text" name="beschrijving" id="bescrijving" placeholder="beschrijving"></textarea>
    <button name="sumbit" type="submit">Submit</button>
</form>

<?php include "include/footer.php"?>