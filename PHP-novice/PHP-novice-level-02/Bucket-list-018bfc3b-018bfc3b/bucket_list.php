<?php

while (true) {
    $r = readline('Hoeveel activiteiten wil je op je bucket list toevoegen?') . PHP_EOL;

    if (is_numeric($r) && $r > 0) {
        break;
    } else {
        echo "Fill a number in pls";
    }
}
$bucketArray = [];

for ($i = 1; $i <= $r; $i++) {
    $bucketArray[] = readline('Voer een activeit in ');
}

foreach ($bucketArray as $index => $value) {
    echo $index + 1 . ". $value\n";
}
