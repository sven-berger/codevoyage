<?php
    $bereich = 'PHP-Bereich';
    $pageTitle = 'Mathematische Operatoren: Teil 2 (Größer-Gleich, Kleiner-Gleich)';
    require_once ($_SERVER['DOCUMENT_ROOT'] . "/../layout/header/core.header.inc.php");
?>

<form action="mathematische-operatoren-teil2.php" method="get">
    <label for="zahl2">Bitte gib eine zweite Zahl ein:</label>
    <input type="number" id="zahl2" name="zahl2" required>
    
    <label for="vergleich_zahl2">Bitte gib eine zweite Zahl ein, mit der du deine (zweite) Zahl vergleichen möchtest:</label>
    <input type="number" id="vergleich_zahl2" name="vergleich_zahl2" required>
   
    <button type="submit">Eingabe abschicken</button>
</form>

<?php if (isset($_GET['zahl2']) && isset($_GET['vergleich_zahl2'])): ?>
    </div>
    </section>
    <?php
        $zweite_zahl = (float)$_GET['zahl2'];
        $vergleich_zahl2 = (float)$_GET['vergleich_zahl2'];
    ?>
    
    <?php if ($zweite_zahl <= $vergleich_zahl2): ?>
        <section class="section">
            <div class="sectionContent">
            <?php echo $zweite_zahl; ?> ist <strong>kleiner oder gleich</strong> als <?php echo $vergleich_zahl2; ?>.
        <?php elseif ($zweite_zahl >= $vergleich_zahl2): ?>
            <section class="section">
            <div class="sectionContent">
            <?php echo $zweite_zahl; ?> ist <strong>größer oder gleich</strong> als <?php echo $vergleich_zahl2; ?>.
        <?php else: ?>
            <p>Du hast die gleiche Zahl eingegeben.</p>
    <?php endif; ?>
<?php endif; ?>


<?php
    require_once ($_SERVER['DOCUMENT_ROOT'] . "/../layout/footer/php.footer.inc.php");
?>