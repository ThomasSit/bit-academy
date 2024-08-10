<?php  

$klas = ['Sjonnie de Wiel', 'Herman Kaal', 'Henk de Steen', 'Inge Kerkhoven', 'Gert Kruiswijk'];
// $i = 0 dus gelijk aan $klas = rogi[0] daarna nog een loop dus daanr $i++ = $i = 1 dus
// $i = 1 = $klas = thomas[1]
for ($i = 0; $i < count($klas); $i++) {
    echo  $klas[$i] . PHP_EOL;
}