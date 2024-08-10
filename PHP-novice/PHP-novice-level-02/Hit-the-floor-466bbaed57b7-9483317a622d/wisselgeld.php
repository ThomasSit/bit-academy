<?php

function WisselGeld($read)
{
    $munten = array(10, 5, 2, 1);
    foreach ($munten as $munt) {
        if ($read >= $munt) {
            echo floor($read / $munt) . " X " . $munt . " euro " . PHP_EOL;
            $read = $read - ($munt * floor($read / $munt));
        } else {
            echo 'Geen wisselgeld' . PHP_EOL;
        }
    }
}

echo WisselGeld($argv[1]);
