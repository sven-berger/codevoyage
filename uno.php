<?php
session_start();

$bereich = 'Startseite';
$pageTitle = 'UNO-Spiel';
require_once($_SERVER['DOCUMENT_ROOT'] . "/layout/header/app.header.inc.php");
?>


<?php
// Definition aller Karten: rote, gelbe, grüne, blaue und spezielle Aktionskarten
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
        ["farbe" => "Gelb", "wert" => "9"]
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
        ["farbe" => "Rot", "wert" => "Zieh 2"], ["farbe" => "Rot", "wert" => "Zieh 2"], ["farbe" => "Rot", "wert" => "Richtungswechsel"],["farbe" => "Rot", "wert" => "Richtungswechsel"], ["farbe" => "Rot", "wert" => "Aussetzen"], ["farbe" => "Rot", "wert" => "Aussetzen"],
        ["farbe" => "Gelb", "wert" => "Zieh 2"], ["farbe" => "Gelb", "wert" => "Zieh 2"], ["farbe" => "Gelb", "wert" => "Richtungswechsel"], ["farbe" => "Gelb", "wert" => "Richtungswechsel"], ["farbe" => "Gelb", "wert" => "Aussetzen"],["farbe" => "Gelb", "wert" => "Aussetzen"],
        ["farbe" => "Grün", "wert" => "Zieh 2"], ["farbe" => "Grün", "wert" => "Zieh 2"], ["farbe" => "Grün", "wert" => "Richtungswechsel"], ["farbe" => "Grün", "wert" => "Richtungswechsel"], ["farbe" => "Grün", "wert" => "Aussetzen"],["farbe" => "Grün", "wert" => "Aussetzen"],
        ["farbe" => "Blau", "wert" => "Zieh 2"], ["farbe" => "Blau", "wert" => "Zieh 2"], ["farbe" => "Blau", "wert" => "Richtungswechsel"], ["farbe" => "Blau", "wert" => "Richtungswechsel"], ["farbe" => "Blau", "wert" => "Aussetzen"],["farbe" => "Blau", "wert" => "Aussetzen"],

        ["farbe" => "Schwarz", "wert" => "Farbwahl"], ["farbe" => "Schwarz", "wert" => "Farbwahl"],
        ["farbe" => "Schwarz", "wert" => "Farbwahl"], ["farbe" => "Schwarz", "wert" => "Farbwahl"],
        ["farbe" => "Schwarz", "wert" => "Farbwahl +4"], ["farbe" => "Schwarz", "wert" => "Farbwahl +4"],
        ["farbe" => "Schwarz", "wert" => "Farbwahl +4"], ["farbe" => "Schwarz", "wert" => "Farbwahl +4"]
    ];
?>

<?php
// Alle Karten zusammenführen und mischen
    $ziehstapel = array_merge($rote_karten, $gelbe_karten, $gruene_karten, $blaue_karten, $aktionskarten);
    shuffle($ziehstapel);

    // Initialisiere Spielerhände und Ablagestapel
    $meine_hand = [];
    $gegnerische_hand = [];
    $ablagestapel = [];

    // 7 Karten an die Hand des Spielers und des Gegners verteilen
    for ($i = 0; $i < 7; $i++) {
        $meine_hand[] = array_shift($ziehstapel);
        $gegnerische_hand[] = array_shift($ziehstapel);
    }

    // Erste Karte auf den Ablagestapel (keine Aktionskarte)
    while (true) {
        $erste_karte = array_shift($ziehstapel);
        if (!in_array($erste_karte['wert'], ['Zieh 2', 'Richtungswechsel', 'Aussetzen', 'Farbwahl', 'Farbwahl +4'])) {
            $ablagestapel[] = $erste_karte;
            $oberste_karte = $erste_karte;
            break;
        } else {
            array_push($ziehstapel, $erste_karte); // Lege Aktionskarte zurück
        }
    }

    // Speichere alle Zustände in der Session
    $_SESSION['ziehstapel'] = $ziehstapel;
    $_SESSION['meine_hand'] = $meine_hand;
    $_SESSION['gegnerische_hand'] = $gegnerische_hand;
    $_SESSION['ablagestapel'] = $ablagestapel;
    $_SESSION['oberste_karte'] = $oberste_karte;
    $_SESSION['farbwahl_karte'] = null;
    $_SESSION['aktueller_spieler'] = 0; // Startet mit dem Spieler
?>

<div class="section-title">LETZTER SPIELZUG</div>
<?php echo $section_beginn; ?>
    <div class="meldung">
        <p><span class="spieler-style">XX</span> hat folgende Karte gelegt: </p>
        <p><span class="spieler-style">XX</span> konnte keine Karte legen. <span class="spieler-style">XX</span> zieht eine Karte</p>
        <p><span class="spieler-style">XX</span> konnte keine Karte legen. Seine Runde ist beendet.</p>
        <p><span class="spieler-style">XX</span>hat sich die Farbe <span class="meldung-farbe">XXX</span> gewünscht.</p>
    </div>

    <style>
        .meldung {
            text-align: center;
            font-size: 600;
        }

        .meldung-farbe {
            color: darkred;
            font-weight: 500;
        }
    </style>
<?php echo $section_ende; ?>

<div class="section-title">Gegnerische Hand</div>
<?php echo $section_beginn; ?>
<ul class="auflistung-uno">
    <li>Anzahl: <?php echo count($gegnerische_hand); ?></li>
</ul>
<?php echo $section_ende; ?>

<div class="section-title">Ablagestapel (<?php echo count($ablagestapel); ?>)</div>
<?php echo $section_beginn; ?>
<ul class="auflistung-uno">
    <li><?php echo htmlspecialchars($oberste_karte['wert'] . " (" . $aktuelle_farbe . ")"); ?></li>
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