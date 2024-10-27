<?php
    $bereich = 'PHP-Bereich';
    $pageTitle = "Speicherdaten-Umrechner";
    require_once ($_SERVER['DOCUMENT_ROOT'] . "/../layout/header/core.header.inc.php");
?>

<form action="speicherdaten-umrechner.php" method="get" class="form-speicher">
    <label for="vorhandene_einheit">Bitte gib deine vorhandene Einheit an:</label>
    <input type="number" id="vorhandene_einheit" name="vorhandene_einheit" required>
    
    <label for="vorhandener_praefix">Bitte gib deinen vorhandenen Präfix an:</label>
    <select name="vorhandener_praefix" id="vorhandener_praefix">
        <option value="Bit">Bit</option>
        <option value="KiB (Kibibyte)">Kibibyte (KiB)</option>
        <option value="MiB (Mebibyte)">Mebibyte (MiB)</option>
        <option value="GiB (Gibibyte)">Gibibyte (GiB)</option>
        <option value="B (Byte)">Byte</option>
        <option value="KB (Kilobyte)">Kilobyte (Kilobyte)</option>
        <option value="MB (Megabyte)">Megabyte (Megabyte)</option>
        <option value="GB">Gigabyte (Gigabyte)</option>
    </select>

    <label for="gesuchter_praefix">Bitte gib deinen gesuchten Präfix an:</label>
    <select name="gesuchter_praefix" id="gesuchter_praefix">
        <option value="GiB (Gibibyte)">Gibibyte (GiB)</option>
        <option value="MiB (Mebibyte)">Mebibyte (MiB)</option>
        <option value="KiB (Kibibyte)">Kibibyte (KiB)</option>
        <option value="Bit">Bit</option>
        <option value="GB">Gigabyte (Gigabyte)</option>
        <option value="MB (Megabyte)">Megabyte (Megabyte)</option>
        <option value="KB (Kilobyte)">Kilobyte (Kilobyte)</option>
        <option value="B (Byte)">Byte</option>
    </select>
    <button type="submit">Eingabe abschicken</button>
</form>

<?php if (isset($_GET['vorhandene_einheit']) && isset($_GET['vorhandener_praefix']) && isset($_GET['gesuchter_praefix'])): ?>
    </div>
</section>
    <?php
        $umrechnung = [
            "B (Byte)" => 1,
            "Bit" => 1 / 8,
            "KB (Kilobyte)" => 1000,
            "MB (Megabyte)" => 1000 ** 2,
            "GB (Gigabyte)" => 1000 ** 3,
            "KiB (Kibibyte)" => 1024,
            "MiB (Mebibyte)" => 1024 ** 2,
            "GiB (Gibibyte)" => 1024 ** 3
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
                <strong><?php echo $vorhandene_einheit . " " . $vorhandener_praefix ?></strong> entsprechen <strong><?php echo $ergebnis . " " . $gesuchter_praefix; ?></strong>
<?php endif; ?>

<?php
    require_once ($_SERVER['DOCUMENT_ROOT'] . "/../layout/footer/php.footer.inc.php");
?>