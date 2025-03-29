<?php
    require_once("lib/class/register.class.php");
    require_once("lib/forms/register.form.php");

    if (isset($_POST['submit'])) {
        $benutzername = trim($_POST['benutzername']);
        $passwort = $_POST['passwort'];
        $passwort_wdh = $_POST['passwort-wdh'];

        $registrierung = new Registrieren($benutzername, $passwort);
        $registrierung->gleichesPasswort($passwort_wdh);
        $registrierung->checkVorhanden($connection);
        $registrierung->datenSpeichernSql($connection);
    }