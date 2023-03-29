<?php

    
$voornaam = $_POST['voornaam'];
$achternaam = $_POST['achternaam'];
$leeftijd = $_POST['leeftijd'];
$willekeurig_nummer = $_POST["willekeurig_nummer"];

$output = $leeftijd * 3;
$aantalLetters = strlen($voornaam) + strlen($achternaam);
$totaal = ($aantalLetters + $leeftijd) * $willekeurig_nummer;

// strlen is een php fucntie zoek dat op

echo "Hallo $voornaam  je leeftijd is $leeftijd als je 2 keer zo oud bent dan ben je $output
je voornaam en achternaam is ($voornaam $achternaam) hebben bij elkaar $aantalLetters lettersAls ik die bij je leeftijd ($leeftijd) 
optel en vermenigvuldig met $willekeurig_nummer dan kom ik op $totaal.<br>
";



?>
