<?php
    session_start();
    if(!isset($_SESSION["username"])) {
        header("Location: login.php");
        exit();
    }
?>

<?php 
include "include/header.php";
include "include/navbar.php";
?>


<h1>Home!</h1>
<p>Welcome</p>




<?php include "include/footer.php"?>
