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
    <input type="text" name="einheit" value="<?php echo htmlspecialchars($row['einheit']); ?>" required><br>

    <label for="Abkürzung">Abkürzung:</label>
    <input type="text" name="abkuerzung" value="<?php echo htmlspecialchars($row['abkuerzung']); ?>" required><br>

    <button type="submit">Aktualisieren</button>
    <button type="reset">Zurücksetzen</button>
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        if (!empty($_POST['einheit']) && !empty($_POST['abkuerzung'])) {
            $einheit = filter_input(INPUT_POST, 'einheit', FILTER_SANITIZE_SPECIAL_CHARS);
            $abkuerzung = filter_input(INPUT_POST, 'abkuerzung', FILTER_SANITIZE_SPECIAL_CHARS);

            // Die Einheit in der Datenbank aktualisieren
            $prepare = $connection->prepare('UPDATE einkaufsprozess_einheiten SET einheit = :einheit, abkuerzung = :abkuerzung WHERE id = :id');
            $prepare->bindParam(':einheit', $einheit, PDO::PARAM_STR);
            $prepare->bindParam(':abkuerzung', $abkuerzung, PDO::PARAM_STR);
            $prepare->bindParam(':id', $id, PDO::PARAM_INT);
            $prepare->execute();

            echo 'Einheit erfolgreich aktualisiert.';
            header("Location: https://codevoyage.de/acp/einkaufsprozess/einheiten/index.php");
            exit();
        } else {
            echo 'Bitte geben Sie einen Einheiten-Namen und eine Abkürzung ein.';
        }
    } catch (PDOException $e) {
        echo 'Es liegt ein Problem vor: ' . htmlspecialchars($e->getMessage());
    }
}
?>

<?php
require_once ($_SERVER['DOCUMENT_ROOT'] . "/layout/footer/acp.footer.inc.php");
?>