<?php
    $bereich = 'PHP-Bereich';
    $pageTitle = "Einfaches Gewinnspiel";
    require_once ($_SERVER['DOCUMENT_ROOT'] . "/../layout/header/instance.header.inc.php");
?>

<?php echo $section_beginn; ?>
<form action="einfaches-gewinnspiel.php" method="get">
    <label for="eingabe">Bitte gib eine Zahl ein:</label>
    <input type="number" id="eingabe" name="eingabe" required>
    <button type="submit">Absenden</button>
</form>
<?php echo $section_ende; ?>

<?php
    $eingabe = null;
    $jackpot = 3545245;
?>

<?php if (isset($_GET['eingabe'])): ?>
<?php while ($eingabe !== $jackpot): ?>
    <?php $eingabe = (int)$_GET['eingabe']; ?>
    <?php if ($eingabe === $jackpot): ?>
        <?php echo $section_beginn; ?>
        <div class="center success strong">Herzlichen Glückwunsch, du hast gewonnen!</div>
        <?php echo $section_ende; ?>
        <?php break; ?>
    <?php else: ?>
        <?php echo $section_beginn; ?>
            <div class="center fail strong">Leider nichts gewonnen, versuche es erneut.</div>
        <?php echo $section_ende; ?>
        <?php break; ?>
    <?php endif; ?>
<?php endwhile; ?>
<?php endif; ?>

<?php
    require_once ($_SERVER['DOCUMENT_ROOT'] . "/../layout/footer/php.footer.inc.php");
?>