<?php
$bereich = 'Administrationsbereich';
$pageTitle = 'Snippet löschen';
require_once ($_SERVER['DOCUMENT_ROOT'] . "/includes/header.inc.php");

try {
    if (!isset($_GET['id']) || empty($_GET['id'])) {
        echo "Keine gültige ID angegeben!";
        exit;
    }

    $id = $_GET['id'];

    $sql = "SELECT * FROM snippets WHERE id = :id";
    $stmt = $connection->prepare($sql);
    $stmt->execute([':id' => $id]);
    $snippet = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$snippet) {
        echo "Snippet nicht gefunden!";
        exit;
    }

    $sql = "DELETE FROM snippets WHERE id = :id";
    $stmt = $connection->prepare($sql);
    $stmt->execute([':id' => $id]);
    header("Location: https://wissensportal.codevoyage.de/acp/index.php");
    exit;

} catch (PDOException $e) {
    echo "Fehler: " . htmlspecialchars($e->getMessage());
    exit;
}

require_once ($_SERVER['DOCUMENT_ROOT'] . "/acp/includes/footer.inc.php");
?>
