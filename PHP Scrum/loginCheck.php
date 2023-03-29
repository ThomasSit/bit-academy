<?php

if(!empty($_POST['email'])){
    if(($_POST['email'])  == ['thomassit2.0@gmail.com'] && ($_POST['password']) == ['thomas']){
        $_SESSION = true;
        $_SESSION['email'] = 'thomassit2.0@gmail.com';
        $_SESSION['password'] = 'thomas';
    }
    echo "<p> welkom ";
}else{
    header('location:login.php');
}



?>