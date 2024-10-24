<?php
    $bereich = 'PHP-Bereich';
    $pageTitle = "Zahlen raten";
    require_once ($_SERVER['DOCUMENT_ROOT'] . "/../layout/header/php.header.inc.php");
?>

<?php if (!isset($_GET['zahl'])): ?>
    <form action="zahlen-raten.php" method="get">
        <label for="zahl">Bitte gib eine Zahl zwischen 1 - 100 ein:</label>
        <input type="number" id="zahl" name="zahl" min="1" max="100" required>   
    <button type="submit">Eingabe abschicken</button>
    </form>
<?php endif; ?>

<?php
    session_start();
    if (!isset($_SESSION['zufallszahl'])) {
        $_SESSION['zufallszahl'] = rand(0, 101);
    } 
?>

<?php if (isset($_GET['zahl'])): ?>
    <?php 
        $zahl = (int)$_GET['zahl'];
        $zufallszahl = $_SESSION['zufallszahl'];
    ?>
    <?php if ($zahl < $zufallszahl): ?>
        <div class="sectionHeader fail">Höher!</div>
        </div>
        </section>
        <section class="section">
        <div class="sectionContent">
            <form action="zahlen-raten.php" method="get">
                <label for="zahl">Bitte gib eine Zahl zwischen 1 - 100 ein:</label>
                <input type="number" id="zahl" name="zahl" min="1" max="100" required>   
            <button type="submit">Eingabe abschicken</button>
            </form>
    <?php elseif ($zahl > $zufallszahl): ?>
        <div class="sectionHeader fail">Niedriger!</div>
        </div>
        </section>
        <section class="section">
        <div class="sectionContent">
        <form action="zahlen-raten.php" method="get">
            <label for="zahl">Bitte gib eine Zahl zwischen 1 - 100 ein:</label>
            <input type="number" id="zahl" name="zahl" min="1" max="100" required>   
        <button type="submit">Eingabe abschicken</button>
    <?php else: ?>
        <div class="sectionHeader success">Glückwunsch, du hast die richtige Zahl geraten!</div>
        <?php unset($_SESSION['zufallszahl']); ?>
    <?php endif; ?>
<?php endif; ?>

<?php
    require_once ($_SERVER['DOCUMENT_ROOT'] . "/../layout/footer/php.footer.inc.php");
?>