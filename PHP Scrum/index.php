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

<script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
<lottie-player src="https://assets4.lottiefiles.com/packages/lf20_jKO4EX9d7w.json"  background="transparent"  speed="1"  style="width: 500px; height: 500px;"  loop  autoplay></lottie-player>

<?php include "include/footer.php"?>







