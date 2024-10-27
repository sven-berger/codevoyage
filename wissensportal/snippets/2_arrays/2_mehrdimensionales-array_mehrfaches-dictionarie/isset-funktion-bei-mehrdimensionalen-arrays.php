<?php

$personen = [

[
    "Name" => "Klara",
    "Alter" => 32,
    "Geschlecht" => "Weiblich"
],
    
[
    "Name"=>"Peter",
    "Alter"=> 25,
    "Geschlecht"=>"Männlich"
],
        
[
    "Name" => "Hans-Franz",
    "Alter" => 86,
    "Geschlecht" => "Männlich"
]

];

$name = isset($personen[0]["Name"]) ? $personen[0]["Name"] : "Deine Suche ergab keinen Treffer.";
echo "Die Suche lieferte ein Ergebnis: $name\n";


$hautfarbe = isset($person["Hautfarbe"]) ? $person["Hautfarbe"] : "Deine Suche ergab keinen Treffer.";
echo "$hautfarbe\n";
?>