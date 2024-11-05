<?php
    $bereich = 'PHP-Bereich';
    $pageTitle = "Einfaches Gewinnspiel";
    require_once ($_SERVER['DOCUMENT_ROOT'] . "/../layout/header/instance.header.inc.php");
?>

<form action="einfaches-gewinnspiel.php" method="get">
    <label for="eingabe">Bitte gib eine Zahl ein:</label>
    <input type="number" id="eingabe" name="eingabe" required>
    <button type="submit">Absenden</button>
</form>

<?php
    $eingabe = null;
    $jackpot = 3545245;
?>

<?php if (isset($_GET['eingabe'])): ?>
<?php while ($eingabe !== $jackpot): ?>
        </div>
        </section> 
    <?php $eingabe = (int)$_GET['eingabe']; ?>
        <?php if ($eingabe === $jackpot): ?>
       
        <section class="section">
            <div class="sectionContent">
            <strong><p class="success">Herzlichen Glückwunsch, du hast gewonnen!</p></strong>
            <?php break; ?>
            </div>
        </section>
        <?php else: ?>
            <section class="section">
            <div class="sectionContent">
                <strong><p class="fail">Leider nichts gewonnen, versuche es erneut.</p></strong>
            <?php break; ?>
            </div>
        </section>
        <?php endif; ?>
<?php endwhile; ?>
<?php endif; ?>

<?php
    require_once ($_SERVER['DOCUMENT_ROOT'] . "/../layout/footer/php.footer.inc.php");
?>