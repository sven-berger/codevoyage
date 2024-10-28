<?php
$meine_person = [
    "Vorname" => "Sven",
    "Zweitname" => "Oliver",
    "Nachname" => "Berger",
    "Augenfarbe" => "Blau",
    "Beruf" => "Umschulung zum Fachinformatiker für Anwendungsentwicklung"
];

# Key-Value Pair verändern
$meine_person["Beruf"] = "Hans-Franz Chance";

# Key-Value Pair hinzufügen
$meine_person["Haarfarbe"] = "Dunkelblond";
$meine_person["Katze"] = [
    "Name" => "Anton",
    "Spitzname" => "Fettsack",
    "Beruf" => "Arbeitslos"
];

print_r($meine_person);

# Einzelne Eigenschaft meiner Katze ausgeben
print_r($meine_person["Katze"]["Spitzname"]);

# Bestimmte Informationen im ganzen Satz ausgeben
$katzenberuf = strtolower($meine_person['Katze']['Beruf']);
print_r("Der Name meiner Katze ist {$meine_person['Katze']['Name']} und er ist ein {$katzenberuf}er Schmarotzer!");
?>