<?php

$r = readline('Hoeveel stapels wil je hebben? ');

for ($i = 1; $i <= $r; $i++) {
    // str = string repeat 
    echo str_repeat("* ", $i);
    echo PHP_EOL;
    $i + 1;
}
