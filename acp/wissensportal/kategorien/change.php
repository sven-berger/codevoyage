<?php
$bereich = 'Administrationsbereich';
$pageTitle = 'Snippet hinzufügen';
require_once ($_SERVER['DOCUMENT_ROOT'] . "/layout/header/core.header.inc.php");

$sql = "
ALTER TABLE `wissensportal`
ADD COLUMN `kategorie_id` INT,
ADD FOREIGN KEY (`kategorie_id`) REFERENCES `wissensportal_kategorien`(`id`)
ON DELETE SET NULL ON UPDATE CASCADE";
try {
    $connection->exec($sql);
} catch (PDOException $e) {
    echo 'Fehler beim Ändern der Tabelle: ' . $e->getMessage();
    exit();
}

require_once ($_SERVER['DOCUMENT_ROOT'] . "/layout/footer/acp.full.footer.inc.php");

