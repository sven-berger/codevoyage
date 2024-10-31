<?php
$bereich = 'Startseite';
$pageTitle = 'UNO-Spiel';
require_once ($_SERVER['DOCUMENT_ROOT'] . "/layout/header/app.header.inc.php");
?>

<?php
function verteile_karten($anzahl, &$spielkarten) {
    $handkarten = array_splice($spielkarten, 0, $anzahl);
    return $handkarten;
}

$rote_karten = ["0 (Rot)", "1 (Rot)", "1 (Rot)", "2 (Rot)", "2 (Rot)", "3 (Rot)", "3 (Rot)", "4 (Rot)", "4 (Rot)", "5 (Rot)", "5 (Rot)", "6 (Rot)", "6 (Rot)", "7 (Rot)", "7 (Rot)", "8 (Rot)", "8 (Rot)", "9 (Rot)", "9 (Rot)", "Zieh 2 (Rot)", "Zieh 2 (Rot)", "Richtungswechsel (Rot)", "Richtungswechsel (Rot)", "Aussetzen (Rot)", "Aussetzen (Rot)"];
$gelbe_karten = ["0 (Gelb)", "1 (Gelb)", "1 (Gelb)", "2 (Gelb)", "2 (Gelb)", "3 (Gelb)", "3 (Gelb)", "4 (Gelb)", "4 (Gelb)", "5 (Gelb)", "5 (Gelb)", "6 (Gelb)", "6 (Gelb)", "7 (Gelb)", "7 (Gelb)", "8 (Gelb)", "8 (Gelb)", "9 (Gelb)", "9 (Gelb)", "Zieh 2 (Gelb)", "Zieh 2 (Gelb)", "Richtungswechsel (Gelb)", "Richtungswechsel (Gelb)", "Aussetzen (Gelb)", "Aussetzen (Gelb)"];
$gruene_karten = ["0 (Grün)", "1 (Grün)", "1 (Grün)", "2 (Grün)", "2 (Grün)", "3 (Grün)", "3 (Grün)", "4 (Grün)", "4 (Grün)", "5 (Grün)", "5 (Grün)", "6 (Grün)", "6 (Grün)", "7 (Grün)", "7 (Grün)", "8 (Grün)", "8 (Grün)", "9 (Grün)", "9 (Grün)", "Zieh 2 (Grün)", "Zieh 2 (Grün)", "Richtungswechsel (Grün)", "Richtungswechsel (Grün)", "Aussetzen (Grün)", "Aussetzen (Grün)"];
$blaue_karten = ["0 (Blau)", "1 (Blau)", "1 (Blau)", "2 (Blau)", "2 (Blau)", "3 (Blau)", "3 (Blau)", "4 (Blau)", "4 (Blau)", "5 (Blau)", "5 (Blau)", "6 (Blau)", "6 (Blau)", "7 (Blau)", "7 (Blau)", "8 (Blau)", "8 (Blau)", "9 (Blau)", "9 (Blau)", "Zieh 2 (Blau)", "Zieh 2 (Blau)", "Richtungswechsel (Blau)", "Richtungswechsel (Blau)", "Aussetzen (Blau)", "Aussetzen (Blau)"];
$spezialkarten = ["Farbwahl", "Farbwahl", "Farbwahl", "Farbwahl", "Farbwahl +4", "Farbwahl +4", "Farbwahl +4"];

$spielkarten = array_merge($rote_karten, $gelbe_karten, $gruene_karten, $blaue_karten, $spezialkarten);
shuffle($spielkarten);
$meine_hand = verteile_karten(7, $spielkarten);
$gegnerische_karten = verteile_karten(7, $spielkarten);
$ablagestapel = verteile_karten(1, $spielkarten);

?>

<?php
// Beispiel: Spieler spielt eine Karte auf den Ablagestapel
$gespielte_karte = array_pop($meine_hand); // Die letzte Karte von "meine_hand" wird gespielt
array_push($ablagestapel, $gespielte_karte); // Die Karte wird auf den Ablagestapel gelegt

// Beispiel: Gegner spielt eine Karte auf den Ablagestapel
$gegner_gespielte_karte = array_pop($gegnerische_karten);
array_push($ablagestapel, $gegner_gespielte_karte);
?>

<?php echo $section_beginn; ?>
    <p>Anzahl der Karten vom Gegner: <strong><?php echo count($gegnerische_karten); ?></strong></p>
<?php echo $section_ende; ?>

<div class="section-title">Ablagestapel (<?php echo count($ablagestapel); ?> Karten)</div>
<?php echo $section_beginn; ?>
    <?php foreach ($ablagestapel as $gespielte_karte): ?>
        <div style="text-align: center; font-weight: 600;"><?php echo $gespielte_karte; ?></div>
    <?php endforeach; ?>
<?php echo $section_ende; ?>

<div class="section-title">Meine Karten auf der Hand (Anzahl: <?php echo count($meine_hand); ?>)</div>
<?php echo $section_beginn; ?>
        <ul class="auflistung-uno">
            <?php foreach ($meine_hand as $meine_karten): ?>
            <li><?php echo $meine_karten; ?></li>
            <?php endforeach; ?>
        </ul>
<?php echo $section_ende; ?>

<div class="section-title">Ziehkarten (Anzahl der Ziehkarten: <?php echo count($spielkarten); ?>)</div>
<?php echo $section_beginn; ?>
<ul class="auflistung">
    <?php foreach ($spielkarten as $ziehkarten): ?>
    <li><?php echo $ziehkarten; ?></li>
    <?php endforeach; ?>
</ul>
<?php echo $section_ende; ?>

<?php
    require_once ($_SERVER['DOCUMENT_ROOT'] . "/layout/footer/index.footer.inc.php");
?>