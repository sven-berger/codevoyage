<?php
    $bereich = 'PHP-Bereich';
    $pageTitle = 'Mathematische Operatoren: Teil 2';
    require_once ($_SERVER['DOCUMENT_ROOT'] . "/../layout/header/php.header.inc.php");
?>

<form action="mathematischen-operatoren-teil2.php" method="get">
    <label for="zahl2">Bitte gib eine zweite Zahl ein</label>
    <input type="number" id="zahl2" name="zahl2" required>
    
    <label for="vergleich_zahl2">Bitte gib eine zweite Zahl ein, mit der du deine (zweite) Zahl vergleichen möchtest</label>
    <input type="number" id="vergleich_zahl2" name="vergleich_zahl2" required>
   
    <button type="submit">Eingabe abschicken</button>
</form>

<?php
if (isset($_GET['zahl2']) && isset($_GET['vergleich_zahl2'])) {
    $zweite_zahl = (float)$_GET['zahl2'];
    $vergleich_zahl2 = (float)$_GET['vergleich_zahl2'];
    
    try {
        if ($zweite_zahl <= $vergleich_zahl2) {
            echo "Deine Zahl ist kleiner oder gleich.";
        } elseif ($zweite_zahl >= $vergleich_zahl2) {
            echo "Deine Zahl ist größer oder gleich.";
        } else {
            echo "Du hast die gleiche Zahl eingegeben.";
        }
    } catch (Exception $e) {
        echo "Fehler: " . $e->getMessage();
    }
} else {
    echo "Bitte fülle alle Felder aus.";
}
?>


<?php
    require_once ($_SERVER['DOCUMENT_ROOT'] . "/../layout/footer/php.footer.inc.php");
?>