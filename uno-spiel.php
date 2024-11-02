<?php
session_start();

$bereich = 'Startseite';
$pageTitle = 'UNO-Spiel';
require_once($_SERVER['DOCUMENT_ROOT'] . "/layout/header/app.header.inc.php");

// Initialisierung des Spiels
if (!isset($_SESSION['ziehstapel']) || empty($_SESSION['ziehstapel'])) {
    $rote_karten = [
        ["farbe" => "Rot", "wert" => "0"], ["farbe" => "Rot", "wert" => "1"], ["farbe" => "Rot", "wert" => "1"],
        ["farbe" => "Rot", "wert" => "2"], ["farbe" => "Rot", "wert" => "2"], ["farbe" => "Rot", "wert" => "3"],
        ["farbe" => "Rot", "wert" => "3"], ["farbe" => "Rot", "wert" => "4"], ["farbe" => "Rot", "wert" => "4"],
        ["farbe" => "Rot", "wert" => "5"], ["farbe" => "Rot", "wert" => "5"], ["farbe" => "Rot", "wert" => "6"],
        ["farbe" => "Rot", "wert" => "6"], ["farbe" => "Rot", "wert" => "7"], ["farbe" => "Rot", "wert" => "7"],
        ["farbe" => "Rot", "wert" => "8"], ["farbe" => "Rot", "wert" => "8"], ["farbe" => "Rot", "wert" => "9"],
        ["farbe" => "Rot", "wert" => "9"]
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
        ["farbe" => "Gelb", "wert" => "Aussetzen"], ["farbe" => "Gelb", "wert" => "Aussetzen"],
        ["farbe" => "Grün", "wert" => "Zieh 2"], ["farbe" => "Grün", "wert" => "Zieh 2"],
        ["farbe" => "Grün", "wert" => "Richtungswechsel"], ["farbe" => "Grün", "wert" => "Richtungswechsel"],
        ["farbe" => "Grün", "wert" => "Aussetzen"], ["farbe" => "Grün", "wert" => "Aussetzen"],
        ["farbe" => "Blau", "wert" => "Zieh 2"], ["farbe" => "Blau", "wert" => "Zieh 2"],
        ["farbe" => "Blau", "wert" => "Richtungswechsel"], ["farbe" => "Blau", "wert" => "Richtungswechsel"],
        ["farbe" => "Blau", "wert" => "Aussetzen"], ["farbe" => "Blau", "wert" => "Aussetzen"]
    ];
    $gruene_karten = [
        ["farbe" => "Grün", "wert" => "0"], ["farbe" => "Grün", "wert" => "1"], ["farbe" => "Grün", "wert" => "1"],
        ["farbe" => "Grün", "wert" => "2"], ["farbe" => "Grün", "wert" => "2"], ["farbe" => "Grün", "wert" => "3"],
        ["farbe" => "Grün", "wert" => "3"], ["farbe" => "Grün", "wert" => "4"], ["farbe" => "Grün", "wert" => "4"],
        ["farbe" => "Grün", "wert" => "5"], ["farbe" => "Grün", "wert" => "5"], ["farbe" => "Grün", "wert" => "6"],
        ["farbe" => "Grün", "wert" => "6"], ["farbe" => "Grün", "wert" => "7"], ["farbe" => "Grün", "wert" => "7"],
        ["farbe" => "Grün", "wert" => "8"], ["farbe" => "Grün", "wert" => "8"], ["farbe" => "Grün", "wert" => "9"],
        ["farbe" => "Grün", "wert" => "9"]
    ];
    $blaue_karten = [
        ["farbe" => "Blau", "wert" => "0"], ["farbe" => "Blau", "wert" => "1"], ["farbe" => "Blau", "wert" => "1"],
        ["farbe" => "Blau", "wert" => "2"], ["farbe" => "Blau", "wert" => "2"], ["farbe" => "Blau", "wert" => "3"],
        ["farbe" => "Blau", "wert" => "3"], ["farbe" => "Blau", "wert" => "4"], ["farbe" => "Blau", "wert" => "4"],
        ["farbe" => "Blau", "wert" => "5"], ["farbe" => "Blau", "wert" => "5"], ["farbe" => "Blau", "wert" => "6"],
        ["farbe" => "Blau", "wert" => "6"], ["farbe" => "Blau", "wert" => "7"], ["farbe" => "Blau", "wert" => "7"],
        ["farbe" => "Blau", "wert" => "8"], ["farbe" => "Blau", "wert" => "8"], ["farbe" => "Blau", "wert" => "9"],
        ["farbe" => "Blau", "wert" => "9"]
    ];
 
    $aktionskarten = [
        ["farbe" => "Rot", "wert" => "Zieh 2"], ["farbe" => "Rot", "wert" => "Zieh 2"],
        ["farbe" => "Rot", "wert" => "Richtungswechsel"], ["farbe" => "Rot", "wert" => "Richtungswechsel"],
        ["farbe" => "Rot", "wert" => "Aussetzen"], ["farbe" => "Rot", "wert" => "Aussetzen"],
        ["farbe" => "Gelb", "wert" => "Zieh 2"], ["farbe" => "Gelb", "wert" => "Zieh 2"],
        ["farbe" => "Gelb", "wert" => "Richtungswechsel"], ["farbe" => "Gelb", "wert" => "Richtungswechsel"],
        ["farbe" => "Gelb", "wert" => "Aussetzen"], ["farbe" => "Gelb", "wert" => "Aussetzen"],
        ["farbe" => "Grün", "wert" => "Zieh 2"], ["farbe" => "Grün", "wert" => "Zieh 2"],
        ["farbe" => "Grün", "wert" => "Richtungswechsel"], ["farbe" => "Grün", "wert" => "Richtungswechsel"],
        ["farbe" => "Grün", "wert" => "Aussetzen"], ["farbe" => "Grün", "wert" => "Aussetzen"],
        ["farbe" => "Blau", "wert" => "Zieh 2"], ["farbe" => "Blau", "wert" => "Zieh 2"],
        ["farbe" => "Blau", "wert" => "Richtungswechsel"], ["farbe" => "Blau", "wert" => "Richtungswechsel"],
        ["farbe" => "Blau", "wert" => "Aussetzen"], ["farbe" => "Blau", "wert" => "Aussetzen"],
        ["farbe" => "Schwarz", "wert" => "Farbwahl"], ["farbe" => "Schwarz", "wert" => "Farbwahl"],
        ["farbe" => "Schwarz", "wert" => "Farbwahl"], ["farbe" => "Schwarz", "wert" => "Farbwahl"],
        ["farbe" => "Schwarz", "wert" => "Farbwahl +4"], ["farbe" => "Schwarz", "wert" => "Farbwahl +4"],
        ["farbe" => "Schwarz", "wert" => "Farbwahl +4"], ["farbe" => "Schwarz", "wert" => "Farbwahl +4"]
    ];
    
    // Alle Karten zusammenführen und mischen
    $ziehstapel = array_merge($rote_karten, $gelbe_karten, $gruene_karten, $blaue_karten, $aktionskarten);
    shuffle($ziehstapel);

    $meine_hand = [];
    $gegnerische_hand = [];
    $ablagestapel = [];

    // 7 Karten an die Hand des Spielers und des Gegners verteilen
    for ($i = 0; $i < 7; $i++) {
        $meine_hand[] = array_shift($ziehstapel);
        $gegnerische_hand[] = array_shift($ziehstapel);
    }

    // Erste Karte für den Ablagestapel suchen (keine Aktionskarte)
    while (true) {
        $erste_karte = array_shift($ziehstapel);
        if (!in_array($erste_karte['wert'], ['Zieh 2', 'Richtungswechsel', 'Aussetzen', 'Farbwahl', 'Farbwahl +4'])) {
            $ablagestapel[] = $erste_karte;
            break;
        } else {
            // Falls es eine Aktionskarte ist, wird sie zurück ans Ende des Ziehstapels gelegt
            array_push($ziehstapel, $erste_karte);
        }
    }

    // Speichere die aktuellen Kartenzustände in der Session
    $_SESSION['ziehstapel'] = $ziehstapel;
    $_SESSION['meine_hand'] = $meine_hand;
    $_SESSION['gegnerische_hand'] = $gegnerische_hand;
    $_SESSION['ablagestapel'] = $ablagestapel;
} else {
    // Wenn die Session bereits initialisiert wurde, laden wir die Werte aus der Session
    $ziehstapel = $_SESSION['ziehstapel'];
    $meine_hand = $_SESSION['meine_hand'];
    $gegnerische_hand = $_SESSION['gegnerische_hand'];
    $ablagestapel = $_SESSION['ablagestapel'];
}

// Die oberste Karte des Ablagestapels
$oberste_karte = end($ablagestapel);

// Wenn das Formular gesendet wurde
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['spielzug'])) {
    // Die ausgewählte Karte
    $index_der_karte = $_POST['spielzug'];
    $ausgewaehlte_karte = $meine_hand[$index_der_karte];

    // Prüfen, ob die Karte abgelegt werden kann
    if ($ausgewaehlte_karte['farbe'] === $oberste_karte['farbe'] ||
        $ausgewaehlte_karte['wert'] === $oberste_karte['wert'] ||
        $ausgewaehlte_karte['farbe'] === 'Schwarz') {

        // Erfolgreich abgelegte Karte
        // Entferne die Karte aus der Hand des Spielers und lege sie auf den Ablagestapel
        unset($meine_hand[$index_der_karte]);
        $meine_hand = array_values($meine_hand); // Array neu indexieren
        $ablagestapel[] = $ausgewaehlte_karte;

        // Zusätzliche Logik für Aktionskarten (Beispiel für "Farbwahl +4")
        if ($ausgewaehlte_karte['wert'] === 'Farbwahl +4') {
            // Gegner muss vier Karten ziehen
            for ($i = 0; $i < 4; $i++) {
                $gegnerische_hand[] = array_shift($ziehstapel);
            }
        } elseif ($ausgewaehlte_karte['wert'] === 'Zieh 2') {
            // Gegner muss zwei Karten ziehen
            for ($i = 0; $i < 2; $i++) {
                $gegnerische_hand[] = array_shift($ziehstapel);
            }
        }

        $meldung = "Karte erfolgreich abgelegt!";
    } else {
        // Wenn die Karte nicht abgelegt werden kann, eine neue Karte ziehen
        $gezogene_karte = array_shift($ziehstapel);
        $meine_hand[] = $gezogene_karte;

        // Prüfen, ob die gezogene Karte abgelegt werden kann
        if ($gezogene_karte['farbe'] === $oberste_karte['farbe'] ||
            $gezogene_karte['wert'] === $oberste_karte['wert'] ||
            $gezogene_karte['farbe'] === 'Schwarz') {

            // Karte kann sofort abgelegt werden
            unset($meine_hand[array_key_last($meine_hand)]);
            $ablagestapel[] = $gezogene_karte;
            $meldung = "Gezogene Karte konnte abgelegt werden!";
        } else {
            $meldung = "Gezogene Karte konnte nicht abgelegt werden.";
        }
    }

    // Aktualisiere die Spielzustände in der Session
    $_SESSION['ziehstapel'] = $ziehstapel;
    $_SESSION['meine_hand'] = $meine_hand;
    $_SESSION['gegnerische_hand'] = $gegnerische_hand;
    $_SESSION['ablagestapel'] = $ablagestapel;
}
?>

<?php echo $section_beginn; ?>
<?php if (isset($meldung)) echo htmlspecialchars($meldung); ?>
<?php echo $section_ende; ?>

<div class="section-title">Gegnerische Hand</div>
<?php echo $section_beginn; ?>
<ul class="auflistung-uno">
    <li>Anzahl: <?php echo count($gegnerische_hand); ?></li>
</ul>
<?php echo $section_ende; ?>

<div class="section-title">Oberste Karte des Ablagestapels</div>
<?php echo $section_beginn; ?>
<ul class="auflistung-uno">
    <li><?php echo htmlspecialchars($oberste_karte['wert'] . " (" . $oberste_karte['farbe'] . ")"); ?></li>
</ul>
<?php echo $section_ende; ?>

<div class="section-title">Meine Karten auf der Hand (Anzahl: <?php echo count($meine_hand); ?>)</div>
<?php echo $section_beginn; ?>
<ul class="auflistung-uno">
    <?php foreach ($meine_hand as $i => $meine_karten): ?>
        <li><?php echo htmlspecialchars($meine_karten['wert'] . " (" . $meine_karten['farbe'] . ")"); ?></li>
    <?php endforeach; ?>
</ul>
<?php echo $section_ende; ?>

<?php echo $section_beginn; ?>
<form method="POST" action="">
    <label for="spielzug">Welche Karte möchtest du ablegen?</label>
    <select name="spielzug" id="spielzug">
        <?php foreach ($meine_hand as $i => $meine_karten): ?>
            <option value="<?php echo $i; ?>">
                <?php echo htmlspecialchars($meine_karten['wert'] . " (" . $meine_karten['farbe'] . ")"); ?>
            </option>
        <?php endforeach; ?>
    </select>
    <button type="submit">Karte ablegen</button>
</form>
<?php echo $section_ende; ?>

<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/layout/footer/index.footer.inc.php");
?>