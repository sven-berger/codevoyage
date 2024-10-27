<?php
    $bereich = 'PHP-Bereich';
    $pageTitle = 'Mathematische Operatoren: Teil 3 (Ungleich, Gleich - Binär)';
    require_once ($_SERVER['DOCUMENT_ROOT'] . "/../layout/header/core.header.inc.php");
?>

<form action="mathematische-operatoren-teil3.php" method="get">
    <label for="zahl3">Bitte gib eine dritte Zahl ein:</label>
    <input type="number" id="zahl3" name="zahl3" required>
    
    <label for="vergleich_zahl3">Bitte gib eine zweite Zahl ein, mit der du deine (zweite) Zahl vergleichen möchtest:</label>
    <input type="number" id="vergleich_zahl3" name="vergleich_zahl3" required>
   
    <button type="submit">Eingabe abschicken</button>
</form>

<?php if (isset($_GET['zahl3']) && isset($_GET['vergleich_zahl3'])): ?>
    </div>
    </section>
    <?php
        $dritte_zahl = (float)$_GET['zahl3'];
        $vergleich_zahl3 = (float)$_GET['vergleich_zahl3'];
    ?>
    
    <?php if ($dritte_zahl === $vergleich_zahl3): ?>
        <section class="section">
            <div class="sectionContent">
            <?php echo $dritte_zahl; ?> und <?php echo $vergleich_zahl3; ?> sind <strong>gleich</strong>.
        <?php elseif ($zweite_zahl !== $vergleich_zahl3): ?>
            <section class="section">
            <div class="sectionContent">
            <?php echo $dritte_zahl; ?> und <?php echo $vergleich_zahl3; ?> sind <strong>ungleich</strong>.
        <?php else: ?>
            <p>Du hast die gleiche Zahl eingegeben.</p>
    <?php endif; ?>
<?php endif; ?>


<?php
    require_once ($_SERVER['DOCUMENT_ROOT'] . "/../layout/footer/php.footer.inc.php");
?>