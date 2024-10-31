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
    $spezialkarten = ["Farbwahl", "Farbwahl", "Farbwahl", "Farbwahl", "Farbwahl +4", "Farbwahl +4", "Farbwahl +4"]
?>

<h3 class="section-title">Rote Karten</h3>
<?php echo $section_beginn; ?>
    <ul class="auflistung-uno">
    <?php foreach ($rote_karten AS $karte): ?>
        <li><?php echo $karte; ?></li>
    <?php endforeach; ?>
    </ul>
<?php echo $section_ende; ?>

<h3 class="section-title">Gelbe Karten</h3>
<?php echo $section_beginn; ?>
    <ul class="auflistung-uno">
    <?php foreach ($gelbe_karten AS $karte): ?>
        <li><?php echo $karte; ?></li>
    <?php endforeach; ?>
    </ul>
<?php echo $section_ende; ?>

<h3 class="section-title">Grüne Karten</h3>
<?php echo $section_beginn; ?>
    <ul class="auflistung-uno">
    <?php foreach ($gruene_karten AS $karte): ?>
        <li><?php echo $karte; ?></li>
    <?php endforeach; ?>
    </ul>
<?php echo $section_ende; ?>

<h3 class="section-title">Blaue Karten</h3>
<?php echo $section_beginn; ?>
    <ul class="auflistung-uno">
    <?php foreach ($blaue_karten AS $karte): ?>
        <li><?php echo $karte; ?></li>
    <?php endforeach; ?>
    </ul>
<?php echo $section_ende; ?>

<h3 class="section-title">Spezialkarten</h3>
<?php echo $section_beginn; ?>
    <ul class="auflistung-uno">
    <?php foreach ($spezialkarten AS $karte): ?>
        <li><?php echo $karte; ?></li>
    <?php endforeach; ?>
    </ul>
<?php echo $section_ende; ?>

<style>

</style>

<?php
require_once ($_SERVER['DOCUMENT_ROOT'] . "/layout/footer/index.footer.inc.php");
?>