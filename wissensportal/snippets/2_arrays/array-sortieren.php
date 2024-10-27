<?php
$tiere = ["Wal", "Gans", "Affe", "Nashorn", "Zebra", "Esel"];

echo "Unsortierte Liste: ";
print_r($tiere);

// Temporär sortierte Liste
$tiere_temporaer = $tiere;
sort($tiere_temporaer);
echo "Sortierte Liste: ";
print_r($tiere_temporaer);

// Liste sortiert ausgeben (permanent)
sort($tiere);
echo "Sortierte Liste: ";
print_r($tiere);

// Liste umgekehrt sortiert (permanent)
rsort($tiere);
echo "Umgekehrt sortierte Liste: ";
print_r($tiere);
?>