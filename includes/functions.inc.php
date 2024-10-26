<?php
require_once ($_SERVER['DOCUMENT_ROOT'] . "/includes/database.inc.php");

try {
    $eigene_werke = "SELECT * FROM `php_sidebar_left_eigene_werke`";
    $spielereien = "SELECT * FROM `php_sidebar_left_spielereien`";
    $acp_sidebar = "SELECT * FROM `acp_sidebar_left`";


    $ausgabe_eigene_werke = $connection->query($eigene_werke);
    $ausgabe_spielereien = $connection->query($spielereien);
    $ausgabe_acp_sidebar = $connection->query($acp_sidebar);


    $eigene_werke_liste = $ausgabe_eigene_werke->fetchAll(PDO::FETCH_ASSOC);
    $spielereien_liste = $ausgabe_spielereien->fetchAll(PDO::FETCH_ASSOC);
    $acp_sidebar_liste = $ausgabe_acp_sidebar->fetchAll(PDO::FETCH_ASSOC);


} catch (PDOException $e) {
    echo "<p style='color:red;'>Fehler bei der Abfrage: " . htmlspecialchars($e->getMessage()) . "</p>";
}