<?php
    $bereich = 'PHP-Bereich';
    $pageTitle = "Zahlen raten";
    require_once ($_SERVER['DOCUMENT_ROOT'] . "/../layout/header/instance.core.header.inc.php");
?>

<form action="" method="get">
    <label for="start">Start:</label>
    <input type="start" name="start" required><br>

    <label for="ende">Ende:</label>
    <input type="ende" name="ende" required><br>

    <label for="schrittweise">Schrittweise:</label>
    <input type="schrittweise" name="schrittweise" required><br>

    <input type="submit" value="Speichern">
</form>

<?php if (isset($_GET['start']) && isset($_GET['ende']) && isset($_GET['schrittweise'])): ?>
    <?php
    $start = intval($_GET['start']);
    $ende = intval($_GET['ende']);
    $schrittweise = intval($_GET['schrittweise']);

    function zahlen_ausgeben($start, $ende, $schrittweise) {
        foreach (range($start, $ende, $schrittweise) AS $zahl) {
            echo $zahl . " ";
        }
    }

    zahlen_ausgeben($start, $ende, $schrittweise);
    ?>
<?php endif; ?>

<?php
    require_once ($_SERVER['DOCUMENT_ROOT'] . "/../layout/footer/php.footer.inc.php");
?>