<?php

$input = ($argv[1]);

$input = round($input += 0.02, 2, PHP_ROUND_HALF_UP);

const CENTEN = array(50, 20, 10, 5, 2, 1);
const EUROS = array(50, 20, 10, 5);

$geld = intval($input);

$cent = $input - $geld;
$cent = intval(round($cent * 100));

function WisselCent($input, array $CENTEN)
{

    foreach ($CENTEN as $value) {
        $wissel = floor($input / $value);

        if ($wissel >= 1) {
            $input = $input - ($value * $wissel);
            echo $wissel . " x " . $value . " euro" . PHP_EOL;
        } else {
            echo "geen wisselgeld" . PHP_EOL;
        }
    }
}

function WisselEuro($cent, array $EUROS)
{

    foreach ($EUROS as $value) {
        $restcent = floor($cent / $value);

        if ($restcent >= 1) {
            $cent = $cent - ($value * $restcent);

            echo $restcent . " x " . $value . " cent" . PHP_EOL;
        } else {
            echo "geen wisselgeld" . PHP_EOL;
        }
    }
}

function call($input, $cent)
{
    WisselCent($input, CENTEN);
    WisselEuro($cent, EUROS);
    return $input . $cent;
}

call($input, $cent);
