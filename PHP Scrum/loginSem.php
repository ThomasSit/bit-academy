

<?php 




$msg = '';
            
            if (isset($_POST['login']) && !empty($_POST['email']) 
               && !empty($_POST['password'])) {
				
               if ($_POST['email'] == 'thomas' && 
                  $_POST['password'] == '6576') {
                  $_SESSION['valid'] = true;
                  $_SESSION['timeout'] = time();
                  $_SESSION['email'] = 'thomas';
                  
                  echo 'You have entered valid use name and password';
               }else {
                  $msg = 'Wrong username or password';
               }
            }


            
// $email =  $password = '';
// $emailErr = $passwordErr = '';
// $error = [];

// if(isset($_POST['login'])){

//     if(empty($_POST['email'])){
//         $error  = "Invalid email format";
//     }else{
//         $email  = ($_POST['email']);
//     }

//     if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
//         $error = "Invalid email format";
//     }

//     if(empty($_POST['password'])){
//         $error  = "Invalid password format";
//     }else{
//     $password = ($_POST['password']);
//     }

//     if(count($error) > 0){
//         foreach($errors as $error){
//             echo "$errors <br>";
//         }
//     }else{
//         echo $email , $password;
//     }
// }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <Form action="berekening.php" method="POST">
        <label>voornaam</label>
        <input type="text" name="voornaam">
        
        <label>achternaam</label>
        <input type="text" name="achternaam">

        <label>leeftijd</label>
        <input type="number" name="leeftijd">

        <label for="willekeurig_nummer">Willekeurig nummer:</label>
        <input type="number" name="willekeurig_nummer" id="willekeurig_nummer"><br>

        <button type="submit" name="button">button</button>
    </Form>
</body>
</html>

