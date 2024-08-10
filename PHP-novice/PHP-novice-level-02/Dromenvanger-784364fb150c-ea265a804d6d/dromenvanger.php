<?php

while (true) {
    $r = readline('Hoeveel vrienden zal ik vragen om hun droom? ') . PHP_EOL;
    if (is_numeric($r) && $r > 0) {
        break;
    } else {
        echo "Error: Please enter a number greater than zero." . PHP_EOL;
    }
}

$vraagDroom = [];

for ($i = 0; $i < $r; $i++) {
    $naam = readline("Wat is jouw naam? ");
    while (true) {
        $aantalDroomen = readline('Hoeveel dromen ga je opgeven? ');
        if (is_numeric($aantalDroomen) && $aantalDroomen > 0) {
            break;
        } else {
            echo "Vul een geldige nummer in of groter dan 0 ";
        }
    }

    for ($j = 1; $j <= $aantalDroomen; $j++) {
        $vraagDroom[$naam][] = readline('Wat is jouw droom? ');
    }
}

foreach ($vraagDroom as $persoon => $value) {
    foreach ($value as $droom) {
        echo "$persoon heeft dit als droom: $droom" . PHP_EOL;
    }
}
?>
