<?php
    $bereich = 'PHP-Bereich';
    $pageTitle = "Mini-Gewinnspiel";
    require_once ($_SERVER['DOCUMENT_ROOT'] . "/../layout/header/php.header.inc.php");
?>

<form action="mini-gewinnspiel.php" method="get">
    <label for="eingabe">Bitte gib eine Eingabe zwischen 1 und 10 ein:</label>
    <input type="number" id="eingabe" name="eingabe" min="1" max="10" required>
    <button type="submit">Absenden</button>
</form>

<?php
    $eingabe = null;
?>

<?php if (isset($_GET['eingabe'])): ?>
<?php while ($eingabe !== 7): ?>
    <?php $eingabe = (int)$_GET['eingabe']; ?>
        <?php if ($eingabe === 7): ?>
            <p>Herzlichen Glückwunsch, du hast richtig geraten!</p>
            <?php break; ?>
        <?php else: ?>
            <p>Leider falsch, versuche es erneut.</p>
            <?php break; ?>
        <?php endif; ?>
<?php endwhile; ?>
<?php endif; ?>

<?php
    require_once ($_SERVER['DOCUMENT_ROOT'] . "/../layout/footer/php.footer.inc.php");
?>