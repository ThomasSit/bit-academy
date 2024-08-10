<?php

$LandenArr = [
    'Japan' => 'Tokyo',
    'Mexico' => 'Mexico-Stad',
    'de Verenigde Staten' => 'Washington D.C.',
    'India' => 'New Delhi',
    'Zuid-Korea' => 'Seoul',
    'China' => 'Peking',
    'Nigeria' => 'Abuja',
    'Argentinië' => 'Buenos Aires',
    'Egypte' =>  'Cairo',
    'Engeland' => 'London'
];

$i = 0;

foreach ($LandenArr as $index => $value) {
    $r = readline('Wat is de hoofdstad van ' . $index . "? ");
    $r = trim($r);

    if ($r === $value) {
        $i++;
        echo "Correct" . PHP_EOL;
    } else {
        echo "Helaas nog een fout" . PHP_EOL;
    }
}

$aantalVragen = count($LandenArr);

echo "Je hebt $i van de $aantalVragen goed";
