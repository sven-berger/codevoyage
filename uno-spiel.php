<?php
$bereich = 'Startseite';
$pageTitle = 'UNO-Spiel';
require_once ($_SERVER['DOCUMENT_ROOT'] . "/layout/header/app.header.inc.php");
?>

<?php
session_start();

function verteile_karten($anzahl, &$spielkarten) {
    $handkarten = array_splice($spielkarten, 0, $anzahl);
    return $handkarten;
}

// Initialisierung der Spielkarten nur, wenn noch keine Session-Daten vorhanden sind
if (!isset($_SESSION['spielkarten'])) {
    // Definition der Karten
    $rote_karten = [
        ["farbe" => "Rot", "wert" => "0"], ["farbe" => "Rot", "wert" => "1"], ["farbe" => "Rot", "wert" => "1"],
        ["farbe" => "Rot", "wert" => "2"], ["farbe" => "Rot", "wert" => "2"], ["farbe" => "Rot", "wert" => "3"],
        ["farbe" => "Rot", "wert" => "3"], ["farbe" => "Rot", "wert" => "4"], ["farbe" => "Rot", "wert" => "4"],
        ["farbe" => "Rot", "wert" => "5"], ["farbe" => "Rot", "wert" => "5"], ["farbe" => "Rot", "wert" => "6"],
        ["farbe" => "Rot", "wert" => "6"], ["farbe" => "Rot", "wert" => "7"], ["farbe" => "Rot", "wert" => "7"],
        ["farbe" => "Rot", "wert" => "8"], ["farbe" => "Rot", "wert" => "8"], ["farbe" => "Rot", "wert" => "9"],
        ["farbe" => "Rot", "wert" => "9"], ["farbe" => "Rot", "wert" => "Zieh 2"], ["farbe" => "Rot", "wert" => "Zieh 2"],
        ["farbe" => "Rot", "wert" => "Richtungswechsel"], ["farbe" => "Rot", "wert" => "Richtungswechsel"],
        ["farbe" => "Rot", "wert" => "Aussetzen"], ["farbe" => "Rot", "wert" => "Aussetzen"]
    ];
    
    $gelbe_karten = [
        ["farbe" => "Gelb", "wert" => "0"], ["farbe" => "Gelb", "wert" => "1"], ["farbe" => "Gelb", "wert" => "1"],
        ["farbe" => "Gelb", "wert" => "2"], ["farbe" => "Gelb", "wert" => "2"], ["farbe" => "Gelb", "wert" => "3"],
        ["farbe" => "Gelb", "wert" => "3"], ["farbe" => "Gelb", "wert" => "4"], ["farbe" => "Gelb", "wert" => "4"],
        ["farbe" => "Gelb", "wert" => "5"], ["farbe" => "Gelb", "wert" => "5"], ["farbe" => "Gelb", "wert" => "6"],
        ["farbe" => "Gelb", "wert" => "6"], ["farbe" => "Gelb", "wert" => "7"], ["farbe" => "Gelb", "wert" => "7"],
        ["farbe" => "Gelb", "wert" => "8"], ["farbe" => "Gelb", "wert" => "8"], ["farbe" => "Gelb", "wert" => "9"],
        ["farbe" => "Gelb", "wert" => "9"], ["farbe" => "Gelb", "wert" => "Zieh 2"], ["farbe" => "Gelb", "wert" => "Zieh 2"],
        ["farbe" => "Gelb", "wert" => "Richtungswechsel"], ["farbe" => "Gelb", "wert" => "Richtungswechsel"],
        ["farbe" => "Gelb", "wert" => "Aussetzen"], ["farbe" => "Gelb", "wert" => "Aussetzen"]
    ];

    $gruene_karten = [
        ["farbe" => "Grün", "wert" => "0"], ["farbe" => "Grün", "wert" => "1"], ["farbe" => "Grün", "wert" => "1"],
        ["farbe" => "Grün", "wert" => "2"], ["farbe" => "Grün", "wert" => "2"], ["farbe" => "Grün", "wert" => "3"],
        ["farbe" => "Grün", "wert" => "3"], ["farbe" => "Grün", "wert" => "4"], ["farbe" => "Grün", "wert" => "4"],
        ["farbe" => "Grün", "wert" => "5"], ["farbe" => "Grün", "wert" => "5"], ["farbe" => "Grün", "wert" => "6"],
        ["farbe" => "Grün", "wert" => "6"], ["farbe" => "Grün", "wert" => "7"], ["farbe" => "Grün", "wert" => "7"],
        ["farbe" => "Grün", "wert" => "8"], ["farbe" => "Grün", "wert" => "8"], ["farbe" => "Grün", "wert" => "9"],
        ["farbe" => "Grün", "wert" => "9"], ["farbe" => "Grün", "wert" => "Zieh 2"], ["farbe" => "Grün", "wert" => "Zieh 2"],
        ["farbe" => "Grün", "wert" => "Richtungswechsel"], ["farbe" => "Grün", "wert" => "Richtungswechsel"],
        ["farbe" => "Grün", "wert" => "Aussetzen"], ["farbe" => "Grün", "wert" => "Aussetzen"]
    ];

    $blaue_karten = [
        ["farbe" => "Blau", "wert" => "0"], ["farbe" => "Blau", "wert" => "1"], ["farbe" => "Blau", "wert" => "1"],
        ["farbe" => "Blau", "wert" => "2"], ["farbe" => "Blau", "wert" => "2"], ["farbe" => "Blau", "wert" => "3"],
        ["farbe" => "Blau", "wert" => "3"], ["farbe" => "Blau", "wert" => "4"], ["farbe" => "Blau", "wert" => "4"],
        ["farbe" => "Blau", "wert" => "5"], ["farbe" => "Blau", "wert" => "5"], ["farbe" => "Blau", "wert" => "6"],
        ["farbe" => "Blau", "wert" => "6"], ["farbe" => "Blau", "wert" => "7"], ["farbe" => "Blau", "wert" => "7"],
        ["farbe" => "Blau", "wert" => "8"], ["farbe" => "Blau", "wert" => "8"], ["farbe" => "Blau", "wert" => "9"],
        ["farbe" => "Blau", "wert" => "9"], ["farbe" => "Blau", "wert" => "Zieh 2"], ["farbe" => "Blau", "wert" => "Zieh 2"],
        ["farbe" => "Blau", "wert" => "Richtungswechsel"], ["farbe" => "Blau", "wert" => "Richtungswechsel"],
        ["farbe" => "Blau", "wert" => "Aussetzen"], ["farbe" => "Blau", "wert" => "Aussetzen"]
    ];

    $spezialkarten = [
        ["farbe" => "Spezial", "wert" => "Farbwahl"], ["farbe" => "Spezial", "wert" => "Farbwahl"],
        ["farbe" => "Spezial", "wert" => "Farbwahl"], ["farbe" => "Spezial", "wert" => "Farbwahl"],
        ["farbe" => "Spezial", "wert" => "Farbwahl +4"], ["farbe" => "Spezial", "wert" => "Farbwahl +4"],
        ["farbe" => "Spezial", "wert" => "Farbwahl +4"], ["farbe" => "Spezial", "wert" => "Farbwahl +4"]
    ];

    // Alle Karten zusammenführen und mischen
    $spielkarten = array_merge($rote_karten, $gelbe_karten, $gruene_karten, $blaue_karten, $spezialkarten);
    shuffle($spielkarten);

    // Karten verteilen
    $_SESSION['meine_hand'] = verteile_karten(7, $spielkarten);
    $_SESSION['gegnerische_karten'] = verteile_karten(7, $spielkarten);
    $_SESSION['ablagestapel'] = verteile_karten(1, $spielkarten);
    $_SESSION['spielkarten'] = $spielkarten;
}

// Daten aus der Session laden
$meine_hand = $_SESSION['meine_hand'];
$gegnerische_karten = $_SESSION['gegnerische_karten'];
$ablagestapel = $_SESSION['ablagestapel'];
$spielkarten = $_SESSION['spielkarten'];

// Formularverarbeitung für das Spielen einer Karte
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['reset'])) {
        session_unset();
        session_destroy();
        header("Location: " . $_SERVER['PHP_SELF']);
        exit();
    }
    
    try {
        if (!empty($_POST['spielzug'])) {
            $gespielte_karte_index = $_POST['spielzug'];

            // Gespielte Karte holen
            $gespielte_karte = $meine_hand[$gespielte_karte_index];

            // Oberste Karte auf dem Ablagestapel
            $oberste_karte = end($ablagestapel);

            // Überprüfen, ob die gespielte Karte gültig ist
            if ($gespielte_karte['farbe'] == $oberste_karte['farbe'] || 
                $gespielte_karte['wert'] == $oberste_karte['wert'] || 
                $gespielte_karte['farbe'] == "Spezial") {
                
                // Karte aus der Hand entfernen
                unset($meine_hand[$gespielte_karte_index]);

                // Karte zum Ablagestapel hinzufügen
                array_push($ablagestapel, $gespielte_karte);

                // Hand neu indizieren, damit die Indizes korrekt bleiben
                $meine_hand = array_values($meine_hand);

                // Session-Daten aktualisieren
                $_SESSION['meine_hand'] = $meine_hand;
                $_SESSION['ablagestapel'] = $ablagestapel;
            } else {
                echo "Ungültiger Spielzug. Die Karte passt nicht zur obersten Karte auf dem Ablagestapel.";
            }
        }
    } catch (Exception $e) {
        echo 'Es liegt ein Problem vor: ' . htmlspecialchars($e->getMessage());
    }
}
?>

<?php echo $section_beginn; ?>
<p>Anzahl der Karten vom Gegner: <strong><?php echo count($gegnerische_karten); ?></strong></p>
<?php echo $section_ende; ?>

<div class="section-title">Ablagestapel (<?php echo count($ablagestapel); ?> Karten)</div>
<?php echo $section_beginn; ?>
<div style="text-align: center; font-weight: 600;">
    <?php
    $oberste_karte = end($ablagestapel);
    echo htmlspecialchars($oberste_karte['wert'] . " (" . $oberste_karte['farbe'] . ")");
    ?>
</div>
<?php echo $section_ende; ?>

<div class="section-title">Meine Karten auf der Hand (Anzahl: <?php echo count($meine_hand); ?>)</div>
<?php echo $section_beginn; ?>
<ul class="auflistung-uno">
    <?php foreach ($meine_hand as $index => $meine_karte): ?>
        <li><?php echo htmlspecialchars($meine_karte['wert'] . " (" . $meine_karte['farbe'] . ")"); ?></li>
    <?php endforeach; ?>
</ul>
<?php echo $section_ende; ?>

<?php echo $section_beginn; ?>
<form action="" method="POST">
    <label for="spielzug">Welche Karte möchtest du spielen?</label>
    <select id="spielzug" name="spielzug">
        <?php foreach ($meine_hand as $index => $meine_karte): ?>
            <option value="<?php echo $index; ?>">
                <?php echo htmlspecialchars($meine_karte['wert'] . " (" . $meine_karte['farbe'] . ")"); ?>
            </option>
        <?php endforeach; ?>
    </select>
    <button type="submit">Karte spielen</button>
    <button type="submit" name="reset">Neustart</button>
</form>
<?php echo $section_ende; ?>

<div class="section-title">Ziehkarten (Anzahl der Ziehkarten: <?php echo count($spielkarten); ?>)</div>
<?php echo $section_beginn; ?>
<ul class="auflistung">
    <?php foreach ($spielkarten as $ziehkarte): ?>
        <li><?php echo htmlspecialchars($ziehkarte['wert'] . " (" . $ziehkarte['farbe'] . ")"); ?></li>
    <?php endforeach; ?>
</ul>
<?php echo $section_ende; ?>

<?php
require_once ($_SERVER['DOCUMENT_ROOT'] . "/layout/footer/index.footer.inc.php");
?>