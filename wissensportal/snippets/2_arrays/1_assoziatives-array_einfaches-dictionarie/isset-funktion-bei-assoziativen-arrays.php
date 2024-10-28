<?php
$meine_person = [
    "Vorname" => "Sven",
    "Zweitname" => "Oliver",
    "Nachname" => "Berger",
    "Augenfarbe" => "Blau",
    "Beruf" => "Umschulung zum Fachinformatiker für Anwendungsentwicklung"
];

$vorname = isset($meine_person["Vorname"]) ? $meine_person["Vorname"] : "Deine Suche ergab keinen Treffer.";
echo "Die Suche lieferte ein Ergebnis: $vorname\n";
?>