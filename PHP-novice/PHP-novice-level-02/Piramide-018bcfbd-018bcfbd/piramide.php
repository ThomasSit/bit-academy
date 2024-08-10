<?php

$r = readline('Hoeveel stapels wil je hebben? ');

for ($i = 1; $i <= $r; $i++) {
    $j = 1;
    while ($j <= $i) {
        echo "*"." ";
        $j++;
    }
    echo PHP_EOL;
    $i + 1;
}