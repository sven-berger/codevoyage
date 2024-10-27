<?php
$eingabe = 56431;
while ($eingabe !== 3545245) {
    if ($eingabe === 3545245) {
        echo "<p>Herzlichen Glückwunsch, du hast gewonnen!</p>";
        break;
    } else {
        echo "<p>Leider nichts gewonnen, versuche es erneut.</p>";
        break;
    }
}
?>