<?php
$bereich = 'Administrationsbereich';
$pageTitle = "Kategorie bearbeiten (Wissensportal)";
require_once ($_SERVER['DOCUMENT_ROOT'] . "/layout/header/header.inc.php");

try {
    $id = $_GET['id'] ?? null;
    if ($id) {
        $sql = "SELECT * FROM wissensportal_kategorien WHERE id = :id";
        $stmt = $connection->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$row) {
            echo "Kategorie nicht gefunden!";
            exit;
        }
    } else {
        echo "ID fehlt!";
        exit;
    }
} catch (PDOException $e) {
    echo 'Fehler beim Laden der Kategorie: ' . htmlspecialchars($e->getMessage());
    exit;
}
?>

<form action="edit.php?id=<?php echo $id; ?>" method="post">
    <label for="name">Kategoriename:</label>
    <input type="text" name="name" value="<?php echo htmlspecialchars($row['name']); ?>" required><br>

    <input type="submit" value="Speichern">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        if (!empty($_POST['name'])) {
            $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS);

            // Die Kategorie in der Datenbank aktualisieren
            $sql = 'UPDATE wissensportal_kategorien SET name = :name WHERE id = :id';
            $stmt = $connection->prepare($sql);
            $stmt->bindParam(':name', $name, PDO::PARAM_STR);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();

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