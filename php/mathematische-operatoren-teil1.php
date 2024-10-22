<?php
    $bereich = 'PHP-Bereich';
    $pageTitle = 'Mathematische Operatoren: Teil 1';
    require_once ($_SERVER['DOCUMENT_ROOT'] . "/../layout/header/php.header.inc.php");
?>

<form action="mathematische-operatoren-teil1.php" method="get">
    <label for="zahl1">Bitte gib eine Zahl ein</label>
    <input type="number" id="zahl1" name="zahl1" required>
    
    <label for="vergleich_zahl1">Bitte gib eine Zahl ein, mit der du deine Zahl vergleichen möchtest</label>
    <input type="number" id="vergleich_zahl1" name="vergleich_zahl1" required>
   
    <button type="submit">Eingabe abschicken</button>
</form>

<?php
if (isset($_GET['zahl1']) && isset($_GET['vergleich_zahl1'])) {
    $erste_zahl = (float)$_GET['zahl1'];
    $vergleich_zahl1 = (float)$_GET['vergleich_zahl1'];
    
    try {
        if ($erste_zahl < $vergleich_zahl1) {
            echo "Deine Zahl ist kleiner.";
        } elseif ($erste_zahl > $vergleich_zahl1) {
            echo "Deine Zahl ist größer.";
        } else {
            echo "Du hast die gleiche Zahl eingegeben.";
        }
    } catch (Exception $e) {
        echo "Fehler: " . $e->getMessage();
    }
}
?>

<?php
    require_once ($_SERVER['DOCUMENT_ROOT'] . "/../layout/footer/php.footer.inc.php");
?>