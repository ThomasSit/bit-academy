<?php
include "include/connect.php";
include "include/header.php";
include "include/navbar.php";
?>




<form method="POST" action="register.php" class="form-question">
  <input type="username" name="username" placeholder="username" required>
  <input type="password" name="password" placeholder="Password" required>
  <button type="register-button">Register</button>
</form>









<?php
include "include/footer.php";
?>