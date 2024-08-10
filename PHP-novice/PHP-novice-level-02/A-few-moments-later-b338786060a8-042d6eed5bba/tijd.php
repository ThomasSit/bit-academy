<?php

$num = readline("Hoeveel vrienden zal ik vragen voor hun droom? ");
$array = array();
if (is_numeric($num)) {
    for ($i = 1; $i <= $num; $i++) {
        $name = readline("Wat is jouw naam? ");
        $hoeveel = readline("Hoeveel dromen heb jij? ");

        $dreams = array();
        for ($j = 1; $j <= $hoeveel; $j++) {
            $dream = readline("Wat is jouw droom? ");
            $dreams[] = $dream;
        }
        $array[$name] = $dreams;
    }
    foreach ($array as $name => $dreams) {
        foreach ($dreams as $dream) {
            echo $name, " droom is ", $dream . PHP_EOL;
        }
    }
} else {
    exit("invalid input");
}
