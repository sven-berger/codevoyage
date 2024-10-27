<?php
    $eingabe = 56431;
?>

<?php while ($eingabe !== 3545245): ?>
    <?php if ($eingabe === 3545245): ?>
        <p>Herzlichen Glückwunsch, du hast gewonnen!</p>
        <?php break; ?>
    <?php else: ?>
        <p>Leider nichts gewonnen, versuche es erneut.</p>
        <?php break; ?>
    <?php endif; ?>
<?php endwhile; ?>