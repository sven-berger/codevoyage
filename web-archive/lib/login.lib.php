<?php
    require_once("lib/class/login.class.php");
    
    if (isset ($_POST['submit'])) {
        $login = new Login($benutzername, $passwort, $connection);
        $benutzerDaten = $login->checkBenutzer();
        $login->checkPasswort($benutzerDaten);
    }