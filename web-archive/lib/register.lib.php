<?php
    require_once("lib/class/register.class.php");
    require_once("lib/forms/register.form.php");

    if (!empty($_POST['benutzername']) && !empty($_POST['vorname']) && !empty($_POST['passwort']) && !empty($_POST['passwort-wdh'])){
        $benutzername = trim($_POST['benutzername']);
        $vorname = htmlspecialchars($_POST['vorname']);
        $passwort = $_POST['passwort'];
        $passwort_wdh = $_POST['passwort-wdh'];

        if (empty($benutzername) || empty($vorname) || empty($passwort) || empty($passwort_wdh)) {
            echo "Bitte füllen Sie alle Felder aus.";
            exit;
        }

        $registrierung = new Registrieren($benutzername, $vorname, $passwort);
        $registrierung->gleichesPasswort($passwort_wdh);
        $registrierung->checkVorhanden($connection);
        $registrierung->datenSpeichernSql($connection);
    }