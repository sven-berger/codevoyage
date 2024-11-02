<?php
session_start();

$bereich = 'Startseite';
$pageTitle = 'UNO-Spiel';
require_once ($_SERVER['DOCUMENT_ROOT'] . "/layout/header/app.header.inc.php");

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

?>

<div class="section-title">Gegnerische Hand</div>
<?php echo $section_beginn; ?>
<ul class="auflistung-uno">
    <li>Anzahl: <?php echo count($gegnerische_hand); ?></li>
</ul>
<?php echo $section_ende; ?>

<div class="section-title">Ablagestapel (Anzahl: <?php echo count($ablagestapel); ?>)</div>
<?php echo $section_beginn; ?>
<ul class="auflistung-uno">
    <?php foreach ($ablagestapel as $i => $abgelegte_karten): ?>
        <li><?php echo htmlspecialchars($abgelegte_karten['wert'] . " (" . $abgelegte_karten['farbe'] . ")"); ?></li>
    <?php endforeach; ?>
</ul>
<?php echo $section_ende; ?>

<div class="section-title">Meine Karten auf der Hand (Anzahl: <?php echo count($meine_hand); ?>)</div>
<?php echo $section_beginn; ?>
<ul class="auflistung-uno">
    <?php foreach ($meine_hand as $i => $meine_karte): ?>
        <li><?php echo htmlspecialchars($meine_karte['wert'] . " (" . $meine_karte['farbe'] . ")"); ?></li>
    <?php endforeach; ?>
</ul>
<?php echo $section_ende; ?>
