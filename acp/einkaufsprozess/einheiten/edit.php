<?php
$bereich = 'Administrationsbereich';
$pageTitle = "Einheit bearbeiten";
require_once ($_SERVER['DOCUMENT_ROOT'] . "/layout/header/app.header.inc.php");

try {
    $id = $_GET['id'] ?? null;
    if ($id) {
        $sql = "SELECT * FROM einkaufsprozess_einheiten WHERE id = :id";
        $stmt = $connection->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$row) {
            echo "Inhalt nicht gefunden!";
            exit;
        }
    } else {
        echo "ID fehlt!";
        exit;
    }
} catch (PDOException $e) {
    echo 'Fehler beim Laden der Inhalte: ' . htmlspecialchars($e->getMessage());
    exit;
}
?>

<form action="edit.php?id=<?php echo $id; ?>" method="post">
    <label for="Einheit">Einheit:</label>
    <input type="text" name="einheit" required><br>

    <label for="Abkürzung">Abkürzung:</label>
    <input type="text" name="abkuerzung" required><br>

    <button type="submit">Hinzufügen</button>
    <button type="reset">Zurücksetzen</button>
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        if (!empty($_POST['einheit']) && !empty($_POST['abkuerzung'])) {
            $produktname = filter_input(INPUT_POST, 'einheit', FILTER_SANITIZE_SPECIAL_CHARS);
            $einheit = filter_input(INPUT_POST, 'abkuerzung', FILTER_SANITIZE_SPECIAL_CHARS);

            // Die Kategorie in der Datenbank aktualisieren
            $prepare = $connection->prepare('UPDATE einkaufsprozess_einheiten (`einheit`, `abkuerzung`) VALUES (:einheit, :abkuerzung)');
            $prepare->bindParam(':einheit', $einheit, PDO::PARAM_STR);
            $prepare->bindParam(':abkuerzung', $abkuerzung, PDO::PARAM_STR);
            $prepare->execute();

            echo 'Kategorie erfolgreich aktualisiert.';
            header("Location: https://codevoyage.de/acp/wissensportal/kategorien/index.php");
            exit();
        } else {
            echo 'Bitte geben Sie einen Kategorienamen ein.';
        }
    } catch (PDOException $e) {
        echo 'Es liegt ein Problem vor: ' . htmlspecialchars($e->getMessage());
    }
}
?>

<?php
require_once ($_SERVER['DOCUMENT_ROOT'] . "/layout/footer/acp.footer.inc.php");
?>