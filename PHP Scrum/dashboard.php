<?php 
include "connect.php";
include "include/header.php";
include "include/navbar.php";
?>

<div class='dashboard_box'>
<?php

$sql = "SELECT  id, name, lastname, beschrijving FROM user";
$result = $conn->query($sql);
// query is een request voor data 

// If the query returns any results, loop through them and display the data
if ($result->num_rows > 0) {
    echo "";
    while($row = $result->fetch_assoc()) {
        echo '<div class="card">';
        echo "<p>Id: " . $row["id"] . "</p>";
        echo "<p>Name: " . $row["name"] . "</p>";
        echo "<p>Lastname: " . $row["lastname"] . "</p>";
        echo "<p>Beschrijving: " . $row["beschrijving"] . "</p>";
        echo '</div>';
        
    }
} 
/* Ik geef hier een box aan waar de for loop in komt vervolgens get_defined_constants
 */
?>
</div>


<?php include "include/footer.php"?>