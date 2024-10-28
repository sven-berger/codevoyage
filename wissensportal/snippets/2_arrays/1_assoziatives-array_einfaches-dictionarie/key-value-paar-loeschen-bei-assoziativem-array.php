<?php
$meine_person = [
    "Vorname" => "Sven",
    "Zweitname" => "Oliver",
    "Nachname" => "Berger",
    "Augenfarbe" => "Blau",
    "Beruf" => "Umschulung zum Fachinformatiker für Anwendungsentwicklung"
];

unset($meine_person["Beruf"]);

$meine_person["Katze"] = [
    "Name" => "Anton",
    "Spitzname" => "Fettsack",
    "Beruf" => "Arbeitslos"
];

unset ($meine_person['Katze']['Spitzname']);