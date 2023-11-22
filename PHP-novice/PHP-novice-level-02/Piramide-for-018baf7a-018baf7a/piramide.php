<?php

$r = readline('Hoeveel stapels wil je hebben? ');

for ($a = 1; $a <= $r; $a++) {
    // str = string repeat 
    echo str_repeat("* ", $a);
    echo PHP_EOL;
    $a + 1;
}
