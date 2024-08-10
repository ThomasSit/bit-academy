<?php

while (true) {
    $r = readline("Hoeveel vrienden zal ik vragen om hun droom? ");

    if (is_numeric($r) && $r > 0) {
        break;
    } else {
        echo "fill a numeric" . PHP_EOL;
    }
}

$VriendenDroomArray = [];

for ($i = 1; $i <= $r; $i++) {
    $VriendenDroomArray[$i]['naam'] = trim(readline('Wat is jouw naam? ') . PHP_EOL);
    echo $VriendenDroomArray[$i]['naam'], PHP_EOL;
    $VriendenDroomArray[$i]['droom'] = trim(readline('Wat is jouw droom? ') . PHP_EOL);
    echo $VriendenDroomArray[$i]['droom'], PHP_EOL;
}

foreach ($VriendenDroomArray as $index => $value) {
    echo $value['naam'] . " heeft dit als droom: "  .  $value['droom'] . PHP_EOL;
}
