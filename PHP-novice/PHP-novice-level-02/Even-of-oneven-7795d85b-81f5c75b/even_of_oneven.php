<?php 

$num = readline("Vul een getal in ");

/* % is rest als $num= 5 rest 2 = 2 rest 1 dan is het oneven 
als $num = 4 rest 2 = 2 rest 0 dan is het even */
if ($num % 2 == 0) {
    echo "een even getal";
} else {
    echo "een oneven getal";
}