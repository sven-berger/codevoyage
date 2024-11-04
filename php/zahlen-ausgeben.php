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
    <input type="number" id="schrittweise" name="schrittweise" min="1" required>

    <input type="submit" value="Speichern">
</form>
</div>
</section>

<?php if (isset($_GET['start']) && isset($_GET['ende']) && isset($_GET['schrittweise'])): ?>
<section>
    <?php
    $start = floatval($_GET['start']);
    $ende = floatval($_GET['ende']);
    $schrittweise = floatval($_GET['schrittweise']);

    if ($schrittweise > 0) {
        function zahlen_ausgeben($start, $ende, $schrittweise) {
            echo "<ul class='auflistung'>";
            foreach (range($start, $ende, $schrittweise) as $zahl) {
                echo "<li>" . htmlspecialchars($zahl) . "</li>";
            }
            echo "</ul>";
        }
        zahlen_ausgeben($start, $ende, $schrittweise);
    } else {
        echo "<p>Bitte geben Sie eine positive Zahl für die Schrittweite ein.</p>";
    }
    ?>
</section>
<?php endif; ?>

<?php
require_once ($_SERVER['DOCUMENT_ROOT'] . "/../layout/footer/php.footer.inc.php");
?>