<?php
$umrechnung = [
    "B (Byte)" => 1,
    "Bit" => 1 / 8,
    "KB (Kilobyte)" => 1000,
    "MB (Megabyte)" => 1000 ** 2,
    "GB (Gigabyte)" => 1000 ** 3,
    "KiB (Kibibyte)" => 1024,
    "MiB (Mebibyte)" => 1024 ** 2,
    "GiB (Gibibyte)" => 1024 ** 3
];

$vorhandene_einheit = 12;
$vorhandener_praefix = "GB (Gigabyte)";
$gesuchter_praefix = "MB (Megabyte)";

$zahl_in_bytes = $vorhandene_einheit * $umrechnung[$vorhandener_praefix];
$ergebnis = $zahl_in_bytes / $umrechnung[$gesuchter_praefix];

echo $vorhandene_einheit . " " . $vorhandener_praefix . " entsprechen" . " " . $ergebnis . " " . $gesuchter_praefix;
?>