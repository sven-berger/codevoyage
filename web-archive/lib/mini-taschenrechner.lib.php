

<?php
    require_once("lib/forms/mini-taschenrechner.form.php");
    require_once("lib/class/mini-taschenrechner.class.php");

    if (isset ($_POST['erste_zahl']) && isset($_POST['zweite_zahl']) && isset($_POST['rechenoperation'])) {
        $zahl1 = (float)$_POST['erste_zahl'];
        $zahl2 = (float)$_POST['zweite_zahl'];
        $rechenoperation = htmlspecialchars($_POST['rechenoperation']);

        $mini = new MiniTaschenrechner($zahl1, $zahl2);

        if ($rechenoperation == "Addition") {
            $mini->operationAddition();
        } elseif ($rechenoperation == "Subtraktion") {
            $mini->operationSubtraktion();
        } elseif ($rechenoperation == "Multiplikation") {
            $mini->operationMultiplikation();
        } elseif ($rechenoperation == "Division") {
            $mini->operationDivision();
        } else {
            echo "Du hast es 'irgendwie' geschafft, eine ungültige Rechenoperation einzugeben.";
        }
    }
