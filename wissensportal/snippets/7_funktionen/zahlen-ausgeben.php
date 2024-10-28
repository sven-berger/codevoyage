<?php
$start = 1;
$ende = 30;
$schrittweite = 1;

function zahlen_ausgeben($start, $ende, $schrittweite) {
    foreach (range($start, $ende, $schrittweite) as $zahl) { 
        echo $zahl . " ";
    }
}

zahlen_ausgeben($start, $ende, $schrittweite);
?>