<?php
    require_once ($_SERVER['DOCUMENT_ROOT'] . "/includes/database.inc.php");
    $eigene_werke = "SELECT * FROM `php_sidebar_left_eigene_werke`";
    $spielereien = "SELECT * FROM `php_sidebar_left_spielereien`";
    $sonstiges = "SELECT * FROM `php_sidebar_left_sonstiges`";
    $community_spiele = "SELECT * FROM `sidebar_left_community_spiele`";
     
    $eigene_werke_liste = $connection->query($eigene_werke)->fetchAll(PDO::FETCH_ASSOC);
    $spielereien_liste = $connection->query($spielereien)->fetchAll(PDO::FETCH_ASSOC);
    $sonstiges_liste = $connection->query($sonstiges)->fetchAll(PDO::FETCH_ASSOC);
    $community_spiele_liste = $connection->query($community_spiele)->fetchAll(PDO::FETCH_ASSOC);