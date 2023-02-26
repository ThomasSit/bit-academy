<?php 
include "include/header.php";
include "include/navbar.php";
?>



<h1>login!</h1>
<p>Welcome</p>

<<<<<<< HEAD
<?php include "include/footer.php"?>
<!-- Build a simple Quora clone for three users.
=======
<div class="form_box">

<form method="post" autocomplete="on" action="login.php">
    <h2>Login</h2>
    <input type="email" name="email" id="email" placeholder="email" placeholder="email"><br><br>
    <input type="password" name="password" id="password" placeholder="password"><br><br>
    <button name="sumbit" type="submit">Submit</button>
</form>
>>>>>>> 4a15bd330d0972b8c4e48da84fdfec3ddd9a200f

You can sign up, log in, post a question, add answers, edit answers.

<<<<<<< HEAD
Make it look good mobile first, look ok on desktop.
=======
<p>Geen account <a href="register.php">Register</a></p>

</div>

<?php 

$email =  $password = '';
$emailErr = $passwordErr = '';
>>>>>>> 4a15bd330d0972b8c4e48da84fdfec3ddd9a200f

Have it so Google can index it properly.

<<<<<<< HEAD
Store the data in a database.
=======
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
>>>>>>> 4a15bd330d0972b8c4e48da84fdfec3ddd9a200f

Make sure the passwords are never stored in plain text.

<<<<<<< HEAD
Use https
=======
?>
>>>>>>> 4a15bd330d0972b8c4e48da84fdfec3ddd9a200f

Bonus points: use clean code and have automated tests in a Gitlab CI/CD pipeline.

That’s a decent aiming point to know if you have the aptitude for this.

Don’t ask for ‘step by step instructions to get me job fast’ because it doesn’t work like that. If you can figure out how to learn this stuff, design all the pieces and make it work, you might be able to design other stuff, too.

Or, make a WordPress website by customising a paid theme. That is often easier and easier to get a job in. But it’s lower paid and a bit more limiting in options. -->