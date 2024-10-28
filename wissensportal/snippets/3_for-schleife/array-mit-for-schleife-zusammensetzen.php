<?php
$tiere_a = ["Wal", "Gans", "Affe", "Nashorn", "Zebra", "Esel"];
$tiere_b = ["Katze", "Nilpferd", "Hund", "Huhn", "Pferd"];

$tiere_a = array_merge($tiere_a, $tiere_b);

print_r($tiere_a);
?>