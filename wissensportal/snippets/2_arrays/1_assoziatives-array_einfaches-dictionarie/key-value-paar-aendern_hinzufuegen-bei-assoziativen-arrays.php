<?php

$meine_person = [
    "Vorname" => "Sven",
    "Zweitname" => "Oliver",
    "Nachname" => "Berger",
    "Augenfarbe" => "Blau",
    "Beruf" => "Umschulung zum Fachinformatiker für Anwendungsentwicklung"
];

#Key-Value Pair verändern
$meine_person["Beruf"] = "Hans-Franz Chance";

print_r($meine_person);

?>