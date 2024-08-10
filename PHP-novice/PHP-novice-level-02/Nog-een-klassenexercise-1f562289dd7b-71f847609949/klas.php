<?php 

$r = [];
$r = readline('Wie zit er in de klas? ');

$value = explode(' ' , $r);

foreach ($value as $index) {
    echo $index . PHP_EOL;
}

