<?php
    $bereich = 'PHP-Bereich';
    $pageTitle = "Einfaches Gewinnspiel";
    require_once ($_SERVER['DOCUMENT_ROOT'] . "/../layout/header/php.header.inc.php");
?>

<form action="einfaches-gewinnspiel.php" method="get">
    <label for="eingabe">Bitte gib eine Zahl einn:</label>
    <input type="number" id="eingabe" name="eingabe" required>
    <button type="submit">Absenden</button>
</form>

<?php
    $eingabe = null;
?>

<?php if (isset($_GET['eingabe'])): ?>
<?php while ($eingabe !== 7): ?>
    <?php $eingabe = (int)$_GET['eingabe']; ?>
        <?php if ($eingabe === 7): ?>
            <p style="margin-top: 20px;">Herzlichen Glückwunsch, du hast gewonnen!</p>
            <?php break; ?>
        <?php else: ?>
            <p style="margin-top: 20px;">Leider nichts gewonnen, versuche es erneut.</p>
            <?php break; ?>
        <?php endif; ?>
<?php endwhile; ?>
<?php endif; ?>

<?php
    require_once ($_SERVER['DOCUMENT_ROOT'] . "/../layout/footer/php.footer.inc.php");
?>