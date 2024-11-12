<?php
$bereich = 'Startseite';
$pageTitle = 'Stempelzeiten';
require_once ($_SERVER['DOCUMENT_ROOT'] . "/layout/header/header.inc.php");
?>

<?php echo $section_beginn; ?>
<form action="" method="post">
    <label for="eingeloggt">Eingeloggt:</label>
    <input type="datetime-local" name="eingeloggt" required><br>

    <label for="ausgeloggt">Ausgeloggt:</label>
    <input type="datetime-local" name="ausgeloggt" required><br>

    <label for="standort">Ort:</label>
    <input type="radio" name="ort" value="standort" required> Standort
    <input type="radio" name="ort" value="homeoffice" required> Homeoffice

    <button type="submit">Hinzufügen</button>
    <button type="reset">Zurücksetzen</button>
</form>
<?php echo $section_ende; ?>

<?php
require_once ($_SERVER['DOCUMENT_ROOT'] . "/layout/footer/acp.footer.inc.php");
?>