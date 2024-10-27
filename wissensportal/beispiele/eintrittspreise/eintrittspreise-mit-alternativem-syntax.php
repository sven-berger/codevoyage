<?php
    $age = 18;
?>

<?php if ($age <= 6 || $age >= 60): ?>
    <p>Eintritt kostenlos!</p>
<?php elseif ($age >= 7 && $age <= 18): ?>
   <p>Eintritt: 2,50€</p>
<?php elseif ($age > 18 && $age <= 30): ?>
    <p>Eintritt: 3€</p>
<?php else: ?>
    <p>Eintritt: 3,50€</p>
<?php endif; ?>