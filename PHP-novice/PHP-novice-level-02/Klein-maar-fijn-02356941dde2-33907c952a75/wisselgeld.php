<?php

const MONEY_EURO = [50, 20, 10, 5, 2, 1];
const MONEY_CENT = [0.50, 0.20, 0.10, 0.05, 0.02, 0.01];

function WisselGeld($read)
{
    $read = round(floatval($read), 2);
    // Zetten MONEY_EURO als $munt wij delen eerst de inkommende getal gedeeldoor de $munt
    //Wij kijken hoeveel keer het erin past wij ronde het af naar beneden dus b.v 21 euro daarin past geen 50 euro dus we loopen weer door de array heen 
    // Met fmod Behouden we wat er nog over is 50 euro is eraf en 21 euro is er nog steeds over.
    // Wij Kijken weer hoeveel erin past in de 21 en ja 20 past erin we ronde het af en blijft 1 euro over en dit gaat zo door totdat het op 0 komt
    foreach (MONEY_EURO as $munt) {
        if ($read >= $munt) { // groter of gelijk aan
            $aantal = floor($read / $munt); // floor = rond af naar beneden 
            echo "$aantal X " . $munt . " euro" . PHP_EOL;
            $read = fmod($read, $munt);
        } else {
            echo "geen wisselgeld " . PHP_EOL;
        }
    }

    foreach (MONEY_CENT as $munt) {
        if ($read >= $munt) {
            echo round(intval($read / $munt)) . " X " . $munt * 100 . " cent " . PHP_EOL;
            $read = fmod($read, $munt);
            $read = round($read, 2); 
        } else {
            echo "geen wisselgeld " . PHP_EOL;
        }
    }
}

echo WisselGeld($argv[1]);
