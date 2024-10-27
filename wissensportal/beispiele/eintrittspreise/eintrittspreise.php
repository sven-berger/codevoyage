<?php
$age = 18;

if ($age <= 6 || $age >= 60) {
    echo "Eintritt kostenlos!";
} elseif ($age >= 7 && $age <= 18) {
    echo "Eintritt: 2,50€";
} elseif ($age > 18 && $age <= 30) {
    echo "Eintritt: 3€";
} else {
    echo "Eintritt: 3,50€";
}
?>