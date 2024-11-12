<?php
$bereich = 'Startseite';
$pageTitle = 'Stempelzeiten';
require_once ($_SERVER['DOCUMENT_ROOT'] . "/layout/header/header.inc.php");
?>

<?php echo $section_beginn; ?>
<form action="" method="post">
    <label for="eingeloggt">Eingeloggt:</label>
    <input type="datetime-local" name="eingeloggt" 
           value="<?php echo date('d.m.Y') . 'T00:00'; ?>" required><br>

    <label for="ausgeloggt">Ausgeloggt:</label>
    <input type="datetime-local" name="ausgeloggt" 
           value="<?php echo date('d.m.Y') . 'T00:00'; ?>" required><br>

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