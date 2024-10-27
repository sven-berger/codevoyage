<?php
    session_start();
    $zahl = 23;
    $zufallszahl = $_SESSION['zufallszahl'];

    if (!isset($_SESSION['zufallszahl'])) {
        $_SESSION['zufallszahl'] = rand(0, 101);
    } 
?>

<?php if ($zahl < $zufallszahl): ?>
    <p>Höher!</p>
<?php elseif ($zahl > $zufallszahl): ?>
    <p>Niedriger!</p>
<?php else: ?>
    <p>Glückwunsch, du hast die richtige Zahl geraten!</p>
    <?php unset($_SESSION['zufallszahl']); ?>
    <a href="zahlen-raten.php">Neues Spiel starten</a>
<?php endif; ?>