<?php 

$cal = readline("Welke operatie  wil je uitvoeren (+ , -)");

if ($cal == "+") { 
    $num1 = readline("Eerste getal? ");
    $num2  = readline("Tweede getal? ");
    $uitkomst = $num1 + $num2;
    echo "Uw resultaat is: " . $uitkomst;
} elseif ($cal == "-") {
    $num1 = readline("Eerste getal? ");
    $num2 = readline("Tweede getal? ");
    $uitkomst = $num1 - $num2;
    echo "Uw resultaat is: " . $uitkomst;
} else {
    echo "Je hebt geen geldige operatie ingevoerd";
}


?>
