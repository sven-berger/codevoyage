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

unset($personen[0]["Alter"]);
unset($personen[1]["Name"]);


print_r($personen);

?>