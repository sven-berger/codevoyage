<?php
$bereich = 'Administrationsbereich';
$pageTitle = 'Einkauf löschen';
require_once ($_SERVER['DOCUMENT_ROOT'] . "/layout/header/header.inc.php");

try {
    if (!isset($_GET['id']) || empty($_GET['id'])) {
        echo "Keine gültige ID angegeben!";
        exit;
    }

    $id = $_GET['id'];

    $sql = "SELECT * FROM einkaufsliste WHERE id = :id";
    $stmt = $connection->prepare($sql);
    $stmt->execute([':id' => $id]);
    $snippet = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$snippet) {
        echo "Menüpunkt nicht gefunden!";
        exit;
    }

    $sql = "DELETE FROM einkaufsliste WHERE id = :id";
    $stmt = $connection->prepare($sql);
    $stmt->execute([':id' => $id]);
    header("Location: https://codevoyage.de/acp/einkaufsliste/index.php");
    exit;

} catch (PDOException $e) {
    echo "Fehler: " . htmlspecialchars($e->getMessage());
    exit;
}

?>

<?php
    require_once ($_SERVER['DOCUMENT_ROOT'] . "/layout/footer/acp.footer.inc.php");
?>