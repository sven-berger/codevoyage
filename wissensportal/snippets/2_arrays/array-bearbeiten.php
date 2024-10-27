<?php
$tiere = ["Wal", "Gans", "Affe", "Nashorn", "Zebra", "Esel"];

// Elemente austauschen
$tiere[1] = "Elefant";

// Elemente anfügen am ENDE
$neue_tiere = [];
array_push($neue_tiere, "Stier");
array_push($neue_tiere, "Gorilla");

// Elemente an bestimmte Stelle einsetzen
array_splice($neue_tiere, 1, 0, "Katze");

// Das letzte Element entfernen
array_pop($neue_tiere);

// Bestimmtes Element entfernen
unset($neue_tiere[0]); // unset() entfernt ein Element dauerhaft
$neue_tiere = array_values($neue_tiere); // Reindizieren des Arrays

// Element mit Namen ansprechen und löschen
$key = array_search("Nashorn", $tiere);
if ($key !== false) {
    unset($tiere[$key]);
    $tiere = array_values($tiere); // Reindizieren des Arrays
}

print_r($tiere);
?>