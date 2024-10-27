<?php

$bereich = 'Administrationsbereich';
$pageTitle = 'Snippet abschicken';
require_once ($_SERVER['DOCUMENT_ROOT'] . "/layout/header/core.header.inc.php");

$sql = "
CREATE TABLE IF NOT EXISTS `wissensportal_kategorien`
(
`ID` INT NOT NULL AUTO_INCREMENT,
`name` VARCHAR(255) NOT NULL
PRIMARY KEY (`ID`)
)";

try {
    $connection->exec($sql);
} catch (PDOException $e) {
    echo 'Fehler beim Erstellen der Tabelle: ' . $e->getMessage();
    exit();
}

$name = $_POST['name'];
$sql = "INSERT INTO wissensportal_kategorie (name) VALUES (:name)";
$stmt = $connection->prepare($sql);
$stmt->execute([':name' => $name]);
header("Location: https://codevoyage.de/acp/wissensportal/kategorien/index.php");

require_once ($_SERVER['DOCUMENT_ROOT'] . "/layout/footer/acp.full.footer.inc.php");
?>