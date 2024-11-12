<?php
    $bereich = 'PHP-Bereich';
    $pageTitle = "Passwortgenerator";
    require_once ($_SERVER['DOCUMENT_ROOT'] . "/../layout/header/instance.header.inc.php");
?>


<?php echo $section_beginn; ?>
<form action="passwortgenerator.php" method="get">
    <label for="laenge">Bitte gib die gewünschte Länge ein (Maximal 81 Zeichen):</label>
        <input type="number" id="laenge" name="laenge" min="1" max="81" required>
    <button type="submit">Passwort generieren</button>
</form>
<?php echo $section_ende; ?>

<?php if (isset($_GET['laenge'])): ?>
    <?php $laenge = intval($_GET['laenge']); ?>
    <?php if ($laenge < 1 || $laenge > 81): ?>
        <?php
            die("Ungültige Länge. Bitte gib eine Zahl zwischen 1 und 81 ein.");
        ?>
    <?php else: ?>
        <?php
            $kleine_buchstaben = "abcdefghijklmnopqrstuvwxyz";
            $grosse_buchstaben = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
            $zahlen = "0123456789";
            $symbole = "!@#$%^&*()_-+=?><[]";
            $zusammengesetzt = $kleine_buchstaben . $grosse_buchstaben . $zahlen . $symbole;
            $passwort = substr(str_shuffle($zusammengesetzt), 0, $laenge);
        ?>
        
        <?php echo $section_beginn; ?>
        <div class="sectionHeader" style="margin-bottom: 20px;">Generiertes Passwort:</div>
        <?php echo htmlspecialchars($passwort); ?>
        <?php echo $section_ende; ?>
    <?php endif; ?>
<?php endif; ?>

<?php
    require_once ($_SERVER['DOCUMENT_ROOT'] . "/../layout/footer/php.footer.inc.php");
?>