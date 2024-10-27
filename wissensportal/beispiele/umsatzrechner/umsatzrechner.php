<?php
$monatlicher_umsatz = [1000, 2000, 3000, 5035, 2341, 900, 1224, 5342, 2345, 6445, 1243, 4673];
$gesamtumsatz = array_sum($monatlicher_umsatz);
$guter_monat = 0;
$anzahl_gute_monate = 0;

foreach ($monatlicher_umsatz as $umsatz) {
    if ($umsatz >= 5000) {
        $guter_monat += $umsatz;
        $anzahl_gute_monate += 1;
    }
}

echo "Gesamtumsatz: {$gesamtumsatz}€ | Gute Monate: {$anzahl_gute_monate} | Gesamtumsatz der guten Monate: {$guter_monat}€";
?>