<?php
    $bereich = 'PHP-Bereich';
    $pageTitle = "Speicherdaten-Umrechner";
    require_once ($_SERVER['DOCUMENT_ROOT'] . "/../layout/header/php.header.inc.php");
?>

<form action="speicherdaten-umrechner.php" method="get">
    <label for="vorhandene_einheit">Bitte gib deine vorhandene Einheit an:</label>
    <input type="number" id="vorhandene_einheit" name="vorhandene_einheit" required>
    
    <label for="vorhandener_praefix">Bitte gib deinen vorhandenen Präfix an:</label>
    <select name="vorhandener_praefix" id="vorhandener_praefix">
        <option value="GiB">Gigabit</option>
        <option value="MiB">Megabit</option>
        <option value="KiB">Kilobit</option>
        <option value="MB">Megabyte</option>
        <option value="KB">Kilobyte</option>
        <option value="B">Byte</option>
        <option value="Bit">Bit</option>
    </select>

    <label for="gesuchte_einheit">Bitte gib deine gesuchte Einheit an:</label>
    <input type="number" id="gesuchte_einheit" name="gesuchte_einheit" required>
    
    <label for="gesuchter_praefix">Bitte gib deinen gesuchten Präfix an:</label>
    <select name="gesuchter_praefix" id="gesuchter_praefix">
        <option value="GiB">Gigabit</option>
        <option value="MiB">Megabit</option>
        <option value="KiB">Kilobit</option>
        <option value="MB">Megabyte</option>
        <option value="KB">Kilobyte</option>
        <option value="B">Byte</option>
        <option value="Bit">Bit</option>
    </select>
    
    <button type="submit">Eingabe abschicken</button>
</form>

<?php
    require_once ($_SERVER['DOCUMENT_ROOT'] . "/../layout/footer/php.footer.inc.php");
?>