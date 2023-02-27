<?php
    session_start();
    if(!isset($_SESSION["username"])) {
        header("Location: login.php");
        exit();
    }
?>

<?php 
include "./include/connect.php";



// $error = array();

// if(isset($_POST['button'])){

//   $email =$_POST['email'];
// $password =$_POST['password'];

//     if(empty($email)){
//         $error[]  =  "Email is required";
//     }
//     if(empty($password)){
//         $error[] = "Password is required";
//     }
//     if(empty($error)){
//         $sql =  "SELECT * FROM user( email, password) values ('$email' , '$password')"; 
//         $conn->close();
//         header("location:succes.php");
//     }

//     if ($conn->query($sql) === TRUE) {
//       header("location:succes.php");
//       exit();
//      } else {
//        echo "Error inserting data: " . $conn->error;
//      }
    
//      $conn->close();
// }

$username = $password = "";

$usernameErr = $passwordErr = "";

if(isset($_POST['button'])){
    if(empty($_POST['username'])){
        $usernameErr = "Please enter your username";
    }else{
        $username = ($_POST['username']);
    }
    
    if(empty($_POST['password'])){
        $passwordErr = "PLease enter your password ";
    }elseif (strtr($_POST['password'])) {
        echo "Your";
    }

}







?>