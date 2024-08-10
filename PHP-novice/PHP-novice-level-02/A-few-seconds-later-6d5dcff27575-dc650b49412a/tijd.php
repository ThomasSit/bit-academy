<?php

$Output = $argv[1];
$string = substr($Output, -1);
$int = (int)substr($Output, 0, -1);

if (!is_numeric($int)) {
    echo " Vul een nummer in";
}

switch ($string) {
    case 'd':
        $seconds = $int * 24 * 60 * 60;
        break;
    case 'u':
        $seconds = $int * 3600;
        break;
    case 'm':
        $seconds = $int * 60;
        break;
    case 's':
        $seconds = $int;
        break;
    default:
        echo "Vul num + d = dag, u = uur, m = minuut, s = secondes";
        exit();
}

echo "$seconds secondes";
