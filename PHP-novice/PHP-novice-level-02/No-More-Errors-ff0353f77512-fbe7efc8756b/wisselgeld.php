<?php

$input = implode(" ", array_slice($argv, 1));

try {
    if (empty($input)) {
        throw new Exception("Verkeerd aantal argumenten. Roep de applicatie aan op de volgende manier: 'wisselgeld.php <bedrag>'" . PHP_EOL);
    } else if ($input < 0) {
        throw new Exception("Input moet een positief getal zijn");
    } else if (containsOperator($input)) {
        throw new Exception("Input moet een valide getal zijn");
    } else if (preg_match('~[a-zA-Z]~', $input)) {
        throw new Exception("Input moet een valide getal zijn");
    } else if (!is_numeric($input)) {
        throw new Exception("Input moet een getal zijn en niet een string");
    }
} catch (Exception $e) {
    echo "Error opgevangen: " . $e->getMessage();
    exit();
}

function containsOperator($var)
{
    $patternOperator = '/[\+\-\*\/\%\=\>\<\!\&\|\^]/';
    return preg_match($patternOperator, $var) ? true : false;
}

$input = round($input += 0.02, 2, PHP_ROUND_HALF_UP);

const CENTEN = array(50, 20, 10, 5, 2, 1);
const EUROS = array(50, 20, 10, 5, 2, 1);

$geld = intval($input);
$cent = intval(round(($input - $geld) * 100));

function WisselCent($cent, array $CENTEN)
{
    $result = "";
    foreach ($CENTEN as $value) {
        $count = intdiv($cent, $value);
        if ($count > 0) {
            $result .= "$count x $value cent\n";
            $cent -= $count * $value;
        }
    }
    return $result;
}

function WisselEuro($geld, array $EUROS)
{
    $result = "";
    foreach ($EUROS as $value) {
        $count = intdiv($geld, $value);
        if ($count > 0) {
            $result .= "$count x $value euro\n";
            $geld -= $count * $value;
        }
    }
    return $result;
}

echo WisselEuro($geld, EUROS);
echo WisselCent($cent, CENTEN);
