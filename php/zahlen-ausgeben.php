<?php
$bereich = 'PHP-Bereich';
$paPOSTitle = "Zahlen ausgeben";
require_once ($_SERVER['DOCUMENT_ROOT'] . "/../layout/header/instance.app.header.inc.php");
?>

<?php echo $section_beginn; ?>
<form action="" method="POST">
    <label for="start">Start:</label>
    <input type="number" id="start" name="start" required>

    <label for="ende">Ende:</label>
    <input type="number" id="ende" name="ende" required>

    <label for="schrittweise">Schrittweise:</label>
    <input type="number" id="schrittweise" name="schrittweise" min="1" required>

    <input type="submit" value="Speichern">
</form>
<?php $section_ende; ?>

<?php if (isset($_POST['start']) && isset($_POST['ende']) && isset($_POST['schrittweise'])): ?>
<?php echo $section_beginn; ?>
    <?php
    $start = floatval($_POST['start']);
    $ende = floatval($_POST['ende']);
    $schrittweise = floatval($_POST['schrittweise']);

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
<?php echo $section_ende; ?>
<?php endif; ?>

<?php
require_once ($_SERVER['DOCUMENT_ROOT'] . "/../layout/footer/php.footer.inc.php");
?>