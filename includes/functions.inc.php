<?php
require_once ($_SERVER['DOCUMENT_ROOT'] . "/includes/database.inc.php");

try {
    $eigene_werke = "SELECT * FROM `php_sidebar_left_eigene_werke`";
    $spielereien_snippets = "SELECT * FROM `php_sidebar_left_spielereien_snippets`";

    $ausgabe_eigene_werke = $connection->query($eigene_werke);
    $ausgabe_spielereien_snippets = $connection->query($spielereien_snippets);

    $eigene_werke_liste = $ausgabe_eigene_werke->fetchAll(PDO::FETCH_ASSOC);
    $spielereien_snippets_liste = $ausgabe_spielereien_snippets->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    echo "<p style='color:red;'>Fehler bei der Abfrage: " . htmlspecialchars($e->getMessage()) . "</p>";
}