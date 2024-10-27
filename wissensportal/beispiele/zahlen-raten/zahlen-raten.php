<?php
    session_start();
    if (!isset($_SESSION['zufallszahl'])) {
        $_SESSION['zufallszahl'] = rand(0, 101);
    } 

    $zahl = 23;
        $zufallszahl = $_SESSION['zufallszahl'];
    
    if ($zahl < $zufallszahl) {
        echo "Höher!";
    } elseif ($zahl > $zufallszahl) {
        echo "Niedriger!";
    } else {
        echo "Glückwunsch, du hast die richtige Zahl geraten!";
        unset($_SESSION['zufallszahl']);
        echo "<a href='zahlen-raten.php'>Neues Spiel starten</a>";
    }
?>