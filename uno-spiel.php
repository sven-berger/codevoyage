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
<?php foreach ($rote_karten AS $karte): ?>
    <ul class="auflistung-uno">
        <li><?php echo $karte; ?></li>
    </ul>
<?php endforeach; ?>
<?php echo $section_ende; ?>


<style>
    .auflistung-uno {
        list-style: none;
        padding-left: 20px;
        display: flex !important;
    }
    .auflistung-uno li::before {
        margin: 0 5px !important;
    }
    .auflistung-uno li::before {
        content: '\f0da '; /* Setzt das Icon als Aufzählungszeichen */
        font-family: "Font Awesome 5 Free"; /* Font Awesome Familie angeben */
        font-weight: 900; /* Für die richtige Gewichtung von Icons */
        color: #3579BD;
        margin-right: 5px;
    }
</style>

<?php
require_once ($_SERVER['DOCUMENT_ROOT'] . "/layout/footer/index.footer.inc.php");
?>