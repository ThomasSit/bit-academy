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

<h1>Home!</h1>
<p>Welcome</p>



<?php include "include/footer.php"?>
