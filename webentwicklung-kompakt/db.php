<?php
    $servername = "i4l8.your-database.de";
    $username = 'dreis1d';
    $passwort = 'r4aPr7Qrv1jjyhxg';
    $dbname = "dreis1d";
    $port = 3306;

    $connection = new PDO("mysql:host=$servername;dbname=$dbname", $username, $passwort);
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);