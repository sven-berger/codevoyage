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

#Key-Value Pair hinzfügen
$meine_person["Haarfarbe"] = "Dunkelblond";

$meine_person["Katze"] = 
[
    "Name" => "Anton",
    "Spitzname" => "Fettsack",
    "Beruf" => "Arbeitslos"
];

print_r($meine_person);

?>