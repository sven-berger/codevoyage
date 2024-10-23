<?php
    $bereich = 'PHP-Bereich';
    $pageTitle = "Zahlen raten";
    require_once ($_SERVER['DOCUMENT_ROOT'] . "/../layout/header/php.header.inc.php");
?>

<form action="zahlen-raten.php" method="get">
    <label for="zahl">Bitte gib eine Zahl zwischen 1 - 100 ein:</label>
    <input type="number" id="erste_zahl" name="erste_zahl" min="1" max="100" required>   
    <button type="submit">Eingabe abschicken</button>
</form>

<?php session_start(); ?>
<?php if (!isset($_SESSION['zufallszahl'])): ?>
    $_SESSION['zufallszahl'] = rand(0, 101);
<?php endif; ?>

<?php if (isset($_GET['zahl'])): ?>
    </div>
</section> 
    <?php 
        $zahl = (int)$_GET['zahl'];
        $zufallszahl = $_SESSION['zufallszahl'];
    ?>
<section class="section">
<div class="sectionContent">
    <?php if ($zahl < $zufallszahl): ?>
        <p>Höher!</p>
    <?php elseif ($zahl > $zufallszahl): ?>
        <p>Niedriger!</p>
    <?php else: ?>
        <p>Glückwunsch, du hast die richtige Zahl geraten!</p>
        <?php unset($_SESSION['zufallszahl']); ?>
    <?php endif; ?>
<?php endif; ?>

<?php
    require_once ($_SERVER['DOCUMENT_ROOT'] . "/../layout/footer/php.footer.inc.php");
?>