<?php
    session_start();
    if(!isset($_SESSION["username"])) {
        header("Location: login.php");
        exit();
    }
?>

<?php 
include "./include/connect.php";

/*
opzet van deze datavbase tabel 
1. Noem de database Scrum
2. Maak een tabel dat heet user 
3. voeg daarbij name, lastname, beschrijving
4. Dan werkt als het goed is deze form
*/

if(isset($_POST['sumbit'])){
    $name = $_POST['name'];
    $lastname = $_POST['lastname'];
    $beschrijving = $_POST['beschrijving'];


    if(isset($_POST['sumbit'])){
    $sql = "INSERT INTO question (name, lastname, beschrijving) VALUES ('$name' , '$lastname' , '$beschrijving')";

    
}else{
        echo "error";
    }

    if ($conn->query($sql) === TRUE) {
       header("location:succes.php");
       exit();
      } else {
        echo "Error inserting data: " . $conn->error;
      }

      $conn->close();

}


