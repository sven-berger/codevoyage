<?php
    $bereich = 'PHP-Bereich';
    $pageTitle = "Zahlen ausgeben";
    require_once ($_SERVER['DOCUMENT_ROOT'] . "/../layout/header/instance.app.header.inc.php");
?>

<section class="section">
<div class="sectionContent">
<form action="" method="get">
    <label for="start">Start:</label>
    <input type="start" name="start" required><br>

    <label for="ende">Ende:</label>
    <input type="ende" name="ende" required><br>

    <label for="schrittweise">Schrittweise:</label>
    <input type="schrittweise" name="schrittweise" required><br>

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