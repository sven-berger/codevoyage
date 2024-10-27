<?php 
$laenge = 15;

$kleine_buchstaben = "abcdefghijklmnopqrstuvwxyz";
$grosse_buchstaben = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
$zahlen = "0123456789";
$symbole = "!@#$%^&*()_-+=?><[]";
    
$zusammengesetzt = $kleine_buchstaben . $grosse_buchstaben . $zahlen . $symbole;
$passwort = substr(str_shuffle($zusammengesetzt), 0, $laenge);
    
echo "Das Passwort lautet: " . $passwort;
?>