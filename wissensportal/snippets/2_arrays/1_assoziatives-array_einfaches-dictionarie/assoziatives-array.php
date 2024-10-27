<?php

$meine_person = [
    "Vorname" => "Sven",
    "Zweitname" => "Oliver",
    "Nachname" => "Berger",
    "Augenfarbe" => "Blau",
    "Beruf" => "Umschulung zum Fachinformatiker für Anwendungsentwicklung"
];

echo ($meine_person["Beruf"]);

$augenfarbe = strtolower($meine_person["Augenfarbe"]);
echo ("Mein Name ist {$meine_person['Vorname']} {$meine_person['Zweitname']} {$meine_person['Nachname']} und meine Augenfarbe ist {$augenfarbe}.");

?>