<?php
$tiere = ["Wal", "Gans", "Affe", "Nashorn", "Zebra", "Esel"];
$counter = 0;

foreach ($tiere as $tier) {
    $counter += 1;
    echo "Nr. $counter " . "ist " . $tier . "\n";
}

?>