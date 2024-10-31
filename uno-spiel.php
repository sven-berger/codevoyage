<?php
$bereich = 'Startseite';
$pageTitle = 'UNO-Spiel';
require_once ($_SERVER['DOCUMENT_ROOT'] . "/layout/header/app.header.inc.php");
?>

<?php
    $rote_karten = ["0", "1", "1", "2", "2", "3", "3", "4", "4", "5", "5", "6", "6", "7", "7", "8", "8", "9", "9", "Zieh 2", "Zieh 2", "Richtungswechsel", "Richtungswechsel", "Aussetzen", "Aussetzen"];
    $gelbe_karten = ["0", "1", "1", "2", "2", "3", "3", "4", "4", "5", "5", "6", "6", "7", "7", "8", "8", "9", "9", "Zieh 2", "Zieh 2", "Richtungswechsel", "Richtungswechsel", "Aussetzen", "Aussetzen"];
    $gruene_karten = ["0", "1", "1", "2", "2", "3", "3", "4", "4", "5", "5", "6", "6", "7", "7", "8", "8", "9", "9", "Zieh 2", "Zieh 2", "Richtungswechsel", "Richtungswechsel", "Aussetzen", "Aussetzen"];
    $blaue_karten = ["0", "1", "1", "2", "2", "3", "3", "4", "4", "5", "5", "6", "6", "7", "7", "8", "8", "9", "9", "Zieh 2", "Zieh 2", "Richtungswechsel", "Richtungswechsel", "Aussetzen", "Aussetzen"];
    $spezialkarten = ["Farbwahl", "Farbwahl", "Farbwahl", "Farbwahl", "Farbwahl +4", "Farbwahl +4", "Farbwahl +4"];

    $spielkarten = array_merge($rote_karten, $gelbe_karten, $gruene_karten, $blaue_karten, $spezialkarten);
    shuffle($spielkarten);

    print_r($spielkarten);
?>

<?php echo $section_beginn; ?>
    <strong>Rote Karten</strong>
    <ul class="auflistung-uno">
    <?php foreach ($rote_karten AS $karte): ?>
        <li><?php echo $karte; ?></li>
    <?php endforeach; ?>
    </ul>
    <strong>Gelbe Karten</strong>
    <ul class="auflistung-uno">
    <?php foreach ($gelbe_karten AS $karte): ?>
        <li><?php echo $karte; ?></li>
    <?php endforeach; ?>
    </ul>
    <strong>Grüne Karten</strong>
    <ul class="auflistung-uno">
    <?php foreach ($gruene_karten AS $karte): ?>
        <li><?php echo $karte; ?></li>
    <?php endforeach; ?>
    </ul>
    <strong>Blaue Karten</strong>
    <ul class="auflistung-uno">
    <?php foreach ($blaue_karten AS $karte): ?>
        <li><?php echo $karte; ?></li>
    <?php endforeach; ?>
    </ul>
    <strong>Spezialkarten</strong>
    <ul class="auflistung-uno">
    <?php foreach ($spezialkarten AS $karte): ?>
        <li><?php echo $karte; ?></li>
    <?php endforeach; ?>
    </ul>
<?php echo $section_ende; ?>

<?php
    $meine_karten = [];
?>

<div class="section-title">Meine Karten auf der Hand</div>
<?php echo $section_beginn; ?>
        <ul class="auflistung">
            <?php foreach ($meine_karten as $meine_hand): ?>
            <li><?php echo $meine_hand; ?></li>
            <?php endforeach; ?>
        </ul>
<?php echo $section_ende; ?>

<?php
    require_once ($_SERVER['DOCUMENT_ROOT'] . "/layout/footer/index.footer.inc.php");
?>