<?php
require_once ($_SERVER['DOCUMENT_ROOT'] . "/includes/database.inc.php");

try {
    $eigene_werke = "SELECT * FROM `php_sidebar_left_eigene_werke`";
    $spielereien = "SELECT * FROM `php_sidebar_left_spielereien`";
    $acp_sidebar_left_seitenleiste = "SELECT * FROM `acp_sidebar_left_seitenleiste`";
    $acp_sidebar_left_eigene_werke = "SELECT * FROM `acp_sidebar_left_eigene_werke`";
    $acp_sidebar_left_sonstiges = "SELECT * FROM `acp_sidebar_left_sonstiges`";

    $ausgabe_eigene_werke = $connection->query($eigene_werke);
    $ausgabe_spielereien = $connection->query($spielereien);
    $ausgabe_acp_sidebar_left_seitenleiste = $connection->query($acp_sidebar_left_seitenleiste);
    $ausgabe_acp_sidebar_left_eigene_werke = $connection->query($acp_sidebar_left_eigene_werke);
    $ausgabe_acp_sidebar_left_sonstiges = $connection->query($acp_sidebar_left_sonstiges);

    $eigene_werke_liste = $ausgabe_eigene_werke->fetchAll(PDO::FETCH_ASSOC);
    $spielereien_liste = $ausgabe_spielereien->fetchAll(PDO::FETCH_ASSOC);
    $acp_sidebar_left_seitenleiste_liste = $ausgabe_acp_sidebar_left_seitenleiste->fetchAll(PDO::FETCH_ASSOC);
    $acp_sidebar_left_eigene_werke_liste = $ausgabe_acp_sidebar_left_eigene_werke->fetchAll(PDO::FETCH_ASSOC);
    $acp_sidebar_left_sonstiges_liste = $ausgabe_acp_sidebar_left_sonstiges->fetchAll(PDO::FETCH_ASSOC);


} catch (PDOException $e) {
    echo "<p style='color:red;'>Fehler bei der Abfrage: " . htmlspecialchars($e->getMessage()) . "</p>";
}