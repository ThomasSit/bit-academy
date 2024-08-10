<?php

$r = [];

while (true) {
    $vraag = readline('Hoeveel landen ga je toevoegen ') . PHP_EOL;
    if (is_numeric($vraag) && $vraag > 0) {
        break;
    } else if ($vraag == 0) {
        echo "Vull hoger dan 0 in aub" . PHP_EOL;
    } else {
        echo "Vull een getal in aub" . PHP_EOL;
    }
}

for ($i = 0; $i < $vraag; $i++) {
    $r['Land'] = readline('Welke Land wil je toeveogen? ') . PHP_EOL;
    $r['Hoofdstad'] = readline('Welke Steden wil je toeveogen? ') . PHP_EOL;
}

foreach ($r as $index => $value) {
    echo "$index, $value";
}
