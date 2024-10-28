<?php
    $age = 18;
?>

<?php if ($age == 1): ?>
    <p>Du zahlst 1€</p>
<?php elseif ($age == 2): ?>
    <p>Du zahlst 2€</p>
<?php elseif ($age == 3): ?>
    <p>Du zahlst 3€</p>
<?php else: ?>
    <p>Du zahlst 1000€!!!</p>
<?php endif; ?>