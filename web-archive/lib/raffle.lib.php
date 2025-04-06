<?php
    require_once "$_SERVER[DOCUMENT_ROOT]" . "/lib/class/raffle.class.php";
    require_once "$_SERVER[DOCUMENT_ROOT]" . "/lib/forms/raffle.form.php";

    if (isset($_POST['gewinnerzahl'])) {
        $eingabe = (int)$_POST['gewinnerzahl'];
        $gewinner = new Gewinnspiel($connection, $eingabe);
        $gewinner->checkGewinnerzahl($eingabe);
    }
?>
