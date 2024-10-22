<?php
    $bereich = 'PHP-Bereich';
    $pageTitle = "Mini-Gewinnspiel";
    require_once ($_SERVER['DOCUMENT_ROOT'] . "/../layout/header/php.header.inc.php");
?>

<form action="mini-gewinnspiel.php" method="get">
    <label for="zahl">Bitte gib eine Zahl zwischen 1 und 10 ein:</label>
        <input type="number" id="zahl" name="zahl" min="1" max="10" required>
    <button type="submit">Absenden</button>
</form>


<?php if (isset($_GET['zahl'])): ?>
    <?php $zahl = (int)$_GET['zahl']; ?>
    <?php if ($zahl != 7): ?>
        <p>Leider falsch, nächster Versuch!</p>
        <form action="mini-gewinnspiel.php" method="get">
            <label for="zahl">Bitte gib eine Zahl zwischen 1 und 10 ein:</label>
            <input type="number" id="zahl" name="zahl" min="1" max="10" required>
            <button type="submit">Absenden</button>
        </form>
    <?php else: ?>
        <p>Herzlichen Glückwunsch, du hast gewonnen!</p>
    <?php endif; ?>
<?php else: ?>
    <form action="mini-gewinnspiel.php" method="get">
        <label for="zahl">Bitte gib eine Zahl zwischen 1 und 10 ein:</label>
        <input type="number" id="zahl" name="zahl" min="1" max="10" required>
        <button type="submit">Absenden</button>
    </form>
<?php endif; ?>


<?php
    require_once ($_SERVER['DOCUMENT_ROOT'] . "/../layout/footer/php.footer.inc.php");
?>