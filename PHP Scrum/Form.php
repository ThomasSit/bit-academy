<?php 
include "include/header.php";
include "include/navbar.php";
?>

<?php
  session_start();
  if(!isset($_SESSION["username"])) {
      header("Location: login.php");
      exit();
  }
?>

<form method="post" autocomplete="on" action="progressQuestionForm.php" class="form-question">
    <h2>Form</h2>
    <input type="text" name="name" id="name" placeholder="naam"><br><br>
    <input type="text" name="lastname" id="lastname" placeholder="lastname"><br><br>
    <textarea type="text" name="beschrijving" id="bescrijving" placeholder="beschrijving"></textarea>
    <button name="sumbit" type="submit">Submit</button>
</form>

<?php include "include/footer.php"?>