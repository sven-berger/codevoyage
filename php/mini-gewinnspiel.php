<?php
    $bereich = 'PHP-Bereich';
    $pageTitle = "Mini-Gewinnspiel";
    require_once ($_SERVER['DOCUMENT_ROOT'] . "/../layout/header/php.header.inc.php");
?>

<?php
    $eingabe = null;
?>

<?php while ($eingabe !== 7): ?>
    <?php if (isset($_GET['eingabe'])): ?>
        <?php
            $eingabe = (int)$_GET['eingabe'];
            if ($eingabe === 7) {
                echo "<p>Herzlichen Glückwunsch, du hast richtig geraten!</p>";
                break;
            } else {
                echo "<p>Leider falsch, versuche es erneut.</p>";
            }
        ?>
    <?php endif; ?>
    <form action="mini-gewinnspiel.php" method="get">
        <label for="eingabe">Bitte gib eine Eingabe zwischen 1 und 10 ein:</label>
        <input type="number" id="eingabe" name="eingabe" min="1" max="10" required>
        <button type="submit">Absenden</button>
    </form>
<?php endwhile; ?>

<?php
    require_once ($_SERVER['DOCUMENT_ROOT'] . "/../layout/footer/php.footer.inc.php");
?>