<?php  

$leeftijd = readline("Hoe oud ben je? ");
if ($leeftijd >15){
    echo "Je mag beginnen met rijlessen";
} else if ($leeftijd <=16) {
 echo "Helaas, je mag nog niet beginnen met rijlessen";
}