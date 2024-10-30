<?php
    $bereich = 'PHP-Bereich';
    $pageTitle = "Zahlen ausgeben";
    require_once ($_SERVER['DOCUMENT_ROOT'] . "/../layout/header/instance.app.header.inc.php");
?>

<section class="section">
<div class="sectionContent">
<form action="" method="get">
    <label for="start">Start:</label>
    <input type="number" id="start" name="start" required>

    <label for="ende">Ende:</label>
    <input type="number" id="ende" name="ende" required>

    <label for="schrittweise">Schrittweise:</label>
    <input type="number" id="schrittweise" name="schrittweise" required>

    <input type="submit" value="Speichern">
</form>
</div>
</section>



<?php if (isset($_GET['start']) && isset($_GET['ende']) && isset($_GET['schrittweise'])): ?>
<section class="section">
<div class="sectionContent">
    <?php
    $start = floatval($_GET['start']);
    $ende = floatval($_GET['ende']);
    $schrittweise = floatval($_GET['schrittweise']);

    function zahlen_ausgeben($start, $ende, $schrittweise) {
        echo "<div class='auflistung'><ul>";
        foreach (range($start, $ende, $schrittweise) AS $zahl) {
            echo "<li>" . $zahl . "</li>";
        }
        echo "</div>";
    }

    zahlen_ausgeben($start, $ende, $schrittweise);
    ?>
</div>
</section>
<?php endif; ?>

<?php
    require_once ($_SERVER['DOCUMENT_ROOT'] . "/../layout/footer/php.footer.inc.php");
?>