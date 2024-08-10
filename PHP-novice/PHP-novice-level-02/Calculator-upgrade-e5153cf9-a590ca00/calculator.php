<?php 

$operator = readline("Kies tussen +, - , / , * , %  ");


if (strpos("+-/*%", $operator) === false) {
    echo "geen geldige operatie";
    exit;
}

$a = readline("Kies je eerste getal: ");
if (!is_numeric($a)) {
    echo "geen getal";
    exit;
}

$b = readline("Kies je tweede getal: ");
if (!is_numeric($b)) {
    echo "geen getal";
    exit;
}
$c = "";

echo "Het is antwoord: ";

switch ($operator) {
    case "+":
        echo $result = $a + $b;
        break;

    case "-":
        echo $result = $a - $b;
        break;

    case "*":
        echo $result = $a * $b;
        break;
                
    case "/":
        echo  $result = $a / $b;
        break;

    case "%":
        echo $result = $a % $b;
        break;

    default:
        echo "";
        break;
}
