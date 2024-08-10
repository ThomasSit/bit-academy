<?php

function WisselGeld($read)
{
    if (empty($read)) {
        return 'Geen wisselgeld';
    } else if ($read < 0 || !is_numeric($read)) {
        return 'Geen wisselgeld';
    } else {
        $euro = intval($read / 1);
        return $euro . ' x 1 euro';
    }
}

echo WisselGeld(100);
echo WisselGeld(0);
?>
