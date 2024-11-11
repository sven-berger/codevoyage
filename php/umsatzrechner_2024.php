<?php
    $bereich = 'PHP-Bereich';
    $pageTitle = "Umsatzrechner für das Jahr 2024";
    require_once ($_SERVER['DOCUMENT_ROOT'] . "/../layout/header/instance.header.inc.php");
?>

<?php echo $section_beginn; ?>
<p><a href="https://php.codevoyage.de/umsatzrechner_2023.php">2023</a> | <a href="https://php.codevoyage.de/umsatzrechner_2024.php">2024</a></p>
<?php echo $section_ende; ?>

<?php
$monate_zuweisung = [
    1 => 'Januar', 
    2 => 'Februar', 
    3 => 'März', 
    4 => 'April', 
    5 => 'Mai', 
    6 => 'Juni', 
    7 => 'Juli', 
    8 => 'August', 
    9 => 'September', 
    10 => 'Oktober', 
    11 => 'November', 
    12 => 'Dezember'
];

$benutzereingabe = null;
$monat_vorhanden = [];
?>

<?php echo $section_beginn; ?>
<?php try {
    $sql = "SELECT * FROM `umsatz_2024`";
    $result = $connection->query($sql);
    $rows = $result->fetchAll(PDO::FETCH_ASSOC);
?>
<?php if ($result->rowCount() > 0): ?>
    <table>
        <tr>
            <th>Monat</th>
            <th>Umsatz</th>
        </tr>
    <?php foreach ($rows as $row): ?>
        <tr>
            <td><?php $monats_name = $monate_zuweisung[$row['monat']]; ?> <?php echo htmlspecialchars($monats_name); ?></td>
            <td><?php echo htmlspecialchars($row['umsatz']); ?>€</td>
        </tr>
    <?php endforeach; ?>
    </table>
<?php else: ?>
    <p style='text-align: center;'>Keine Umsatzzahlen gefunden.</p>
<?php endif; ?>
<?php } catch (PDOException $e) {
    echo '<p style="text-align: center;">Es liegt ein Problem vor: ' . $e->getMessage() . '</p>';
} ?>
<?php echo $section_ende; ?>

<?php echo $section_beginn; ?>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <label for="benutzereingabe">Was ist für dich ein guter Monat? (Umsatz)</label>
    <input type="number" id="benutzereingabe" name="benutzereingabe" value="<?php echo $benutzereingabe; ?>" required>
    <button type="submit">Wunschwert eintragen</button>
</form>
<?php echo $section_ende; ?>

<div style="text-align: center;">
<?php

$benutzereingabe = 0;
$showResults = false;

// Wenn das Formular abgeschickt wurde, aktualisiere den Schwellenwert
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['benutzereingabe'])) {
    $benutzereingabe = filter_input(INPUT_POST, 'benutzereingabe', FILTER_SANITIZE_NUMBER_INT);
    $showResults = true; // Ergebnisse anzeigen, da das Formular abgeschickt wurde
}

try {
    $connection = new PDO($dsn, $username, $password);
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // SQL-Abfrage, um bereits vorhandene Monate und Umsätze abzurufen
    $sql = "SELECT monat, umsatz FROM umsatz_2024";
    $stmt = $connection->query($sql);
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Arrays für die Verarbeitung der Daten initialisieren
    $monatlicher_umsatz = [];
    $gesamtumsatz = 0;
    $guter_monat = 0;
    $anzahl_gute_monate = 0;

    // Durch die abgerufenen Daten iterieren
    foreach ($rows as $row) {
        $monat = $row['monat'];
        $umsatz = $row['umsatz'];

        // Umsatz zum monatlichen Umsatz hinzufügen
        $monatlicher_umsatz[$monat - 1] = $umsatz;
        $gesamtumsatz += $umsatz;

        // Prüfen, ob es sich um einen guten Monat handelt (Umsatz >= Schwellenwert)
        if ($umsatz >= $benutzereingabe) {
            $guter_monat += $umsatz;
            $anzahl_gute_monate++;
        }
    }

} catch (PDOException $e) {
    echo "Es ist ein Fehler aufgetreten: " . $e->getMessage();
}

?>
</div>

<?php if ($showResults): ?>
    <?php echo $section_beginn; ?>
    <div style="text-align: center;">

    <span>
        Gesamtumsatz: <strong><?php echo $gesamtumsatz; ?>€</strong> | 
        Gute Monate: <strong><?php echo $anzahl_gute_monate; ?></strong> (Wunsch: <?php echo $benutzereingabe; ?>€ Umsatz pro Monat) |
        Gesamtumsatz der guten Monate: <strong><?php echo $guter_monat; ?>€</strong>
    </span>
    <?php echo $section_ende; ?>
<?php endif; ?>

<?php
    require_once ($_SERVER['DOCUMENT_ROOT'] . "/../layout/footer/php.footer.inc.php");
?>