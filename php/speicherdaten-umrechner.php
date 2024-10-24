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
        <option value="GiB">Gigabyte (GiB)</option>
        <option value="MiB">Megabyte (MiB)</option>
        <option value="KiB">Kilobyte (KiB)</option>
        <option value="GB">Gigabyte (GB)</option>
        <option value="MB">Megabyte (MB)</option>
        <option value="KB">Kilobyte (KB)</option>
        <option value="B">Byte</option>
        <option value="Bit">Bit</option>
    </select>

    <label for="gesuchter_praefix">Bitte gib deinen gesuchten Präfix an:</label>
    <select name="gesuchter_praefix" id="gesuchter_praefix">
        <option value="Bit">Bit</option>
        <option value="B">Byte</option>
        <option value="KB">Kilobyte (KB)</option>
        <option value="MB">Megabyte (MB)</option>
        <option value="GB">Gigabyte (GB)</option>
        <option value="KiB">Kilobyte (KiB)</option>
        <option value="MiB">Megabyte (MiB)</option>
        <option value="GiB">Gigabyte (GiB)</option>

    </select>
    
    <button type="submit">Eingabe abschicken</button>
</form>

<?php if (isset($_GET['vorhandene_einheit']) && isset($_GET['vorhandener_praefix']) && isset($_GET['gesuchter_praefix'])): ?>
    </div>
</section>
    <?php
        $umrechnung = [
            "B" => 1,
            "GiB" => 1024**3,
            "MiB" => 1024**2,
            "KiB" => 1024,
            "GB" => 1000**3,
            "MB" => 1000**2,
            "KB" => 1000,
            "Bit" => 1 / 8
        ];

        $vorhandene_einheit = (int)$_GET['vorhandene_einheit'];
        $vorhandener_praefix = $_GET['vorhandener_praefix'];
        $gesuchter_praefix = $_GET['gesuchter_praefix'];

        $zahl_in_bytes = $vorhandene_einheit * $umrechnung[$vorhandener_praefix];
        $ergebnis = $zahl_in_bytes / $umrechnung[$gesuchter_praefix];
    ?>

    <section class="section">
        <div class="sectionContent">
            <div class="sectionHeader">Das Ergebnis der Umrechnung ist:</div>
                <?php $ergebnis . " " . $gesuchter_praefix; ?>
<?php endif; ?>

<?php
    require_once ($_SERVER['DOCUMENT_ROOT'] . "/../layout/footer/php.footer.inc.php");
?>