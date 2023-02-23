<?php 
include "include/header.php";
include "include/navbar.php";
?>



<h1>login!</h1>
<p>Welcome</p>

<div class="form_box">

<form method="post" autocomplete="on" action="login.php">
    <h2>Login</h2>
    <input type="email" name="email" id="email" placeholder="email" placeholder="email"><br><br>
    <input type="password" name="password" id="password" placeholder="password"><br><br>
    <button name="sumbit" type="submit">Submit</button>
</form>


<p>Geen account <a href="register.php">Register</a></p>

</div>

<?php 

$email =  $password = '';
$emailErr = $passwordErr = '';


if(empty($_POST['email'])){
    $emailErr = "Invalid email format";
}else{
 $email = ($_POST['email']);
}

if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
    $emailErr = "Invalid email format";
}

if(empty($_POST['password'])){
    $passwordErr = "Invalid password format";
}else{
 $password = ($_POST['password']);
}

if($email && $password = true){
    echo $email, $password;
}


?>


<?php include "include/footer.php"?>