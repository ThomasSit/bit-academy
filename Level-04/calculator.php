<?php 

$operator = readline("Welke operatie wil je uitvoeren(+, -, %) ");

$a = readline("Eerste getal? ");

$b= readline("Tweede getal? ");

$getal1 = (int) $a;
$getal2 = (int) $b;

$output = 0;


switch($operator){
    case "+":
        echo $getal1 + $getal2 = $output;
        break;
        case "-":
            echo $getal1 - $getal2 = $output;
            break;
            case "%":
                echo $getal1 % $getal2 = $output;
                break;
                default:
                echo"Ongeldige invoer";
}
?>