<?php
$bereich = 'Administrationsbereich';
$pageTitle = 'Menüpunkt löschen (Wissensportal Kategorien)';
require_once ($_SERVER['DOCUMENT_ROOT'] . "/layout/header/core.header.inc.php");

try {
    if (!isset($_GET['id']) || empty($_GET['id'])) {
        echo "Keine gültige ID angegeben!";
        exit;
    }

    $id = $_GET['id'];

    $sql = "SELECT * FROM wissensportal_kategorien WHERE id = :id";
    $stmt = $connection->prepare($sql);
    $stmt->execute([':id' => $id]);
    $snippet = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$snippet) {
        echo "Menüpunkt nicht gefunden!";
        exit;
    }

    $sql = "DELETE FROM wissensportal_kategorien WHERE id = :id";
    $stmt = $connection->prepare($sql);
    $stmt->execute([':id' => $id]);
    header("Location: https://codevoyage.de/acp/einkaufsprozess/einheiten/index.php");
    exit;

} catch (PDOException $e) {
    echo "Fehler: " . htmlspecialchars($e->getMessage());
    exit;
}

require_once ($_SERVER['DOCUMENT_ROOT'] . "/layout/footer/acp.full.footer.inc.php");
?>