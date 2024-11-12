<?php
$bereich = 'Startseite';
$pageTitle = 'Stempelzeiten';
require_once ($_SERVER['DOCUMENT_ROOT'] . "/layout/header/header.inc.php");
?>

<?php echo $section_beginn; ?>

<form action="" method="post">
    <label for="eingeloggt_datum">Einloggen Datum:</label>
    <input type="date" name="eingeloggt_datum" value="<?php echo date('Y-m-d'); ?>" required><br>

    <label for="eingeloggt_zeit">Einloggen Uhrzeit:</label>
    <input type="time" name="eingeloggt_zeit" value="<?php echo date('H:i'); ?>" required><br>

    <label for="ort">Ort:</label>
    <select name="ort" id="ort">
        <option value="Standort">Standort</option>
        <option value="Homeoffice">Homeoffice</option>
    </select>

    <button type="submit">Hinzufügen</button>
    <button type="reset">Zurücksetzen</button>
</form>


<?php echo $section_ende; ?>


<style>
radio {
    margin-bottom: 0 !important;
}
</style>

<?php
require_once ($_SERVER['DOCUMENT_ROOT'] . "/layout/footer/acp.footer.inc.php");
?>