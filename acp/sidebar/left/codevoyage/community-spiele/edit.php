<?php
$bereich = 'Administrationsbereich';
$pageTitle = "Menüpunkt ändern (Eigene Werke)";
require_once ($_SERVER['DOCUMENT_ROOT'] . "/layout/header/core.header.inc.php");

try {
    $id = $_GET['id'] ?? null;
    if ($id) {
        $sql = "SELECT * FROM sidebar_left_community_spiele WHERE ID = :id";
        $stmt = $connection->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$row) {
            echo "Eintrag nicht gefunden!";
            exit;
        }
    } else {
        echo "ID fehlt!";
        exit;
    }
} catch (PDOException $e) {
    echo 'Fehler beim Laden des Eintrags: ' . htmlspecialchars($e->getMessage());
    exit;
}
?>

<form action="edit.php?id=<?php echo $id; ?>" method="post">
    <label for="url">URL:</label>
    <input type="url" name="url" value="<?php echo htmlspecialchars($row['url']); ?>" required><br>

    <label for="ziel">Ziel:</label>
    <input type="text" name="ziel" value="<?php echo htmlspecialchars($row['ziel']); ?>" required><br>

    <input type="submit" value="Speichern">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        if (!empty($_POST['url']) && !empty($_POST['ziel'])) {
            $url = filter_input(INPUT_POST, 'url', FILTER_SANITIZE_SPECIAL_CHARS);
            $ziel = filter_input(INPUT_POST, 'ziel', FILTER_SANITIZE_SPECIAL_CHARS);

            $prepare = $connection->prepare('UPDATE sidebar_left_community_spiele SET url = :url, ziel = :ziel WHERE ID = :id');
            $prepare->bindParam(':url', $url, PDO::PARAM_STR);
            $prepare->bindParam(':ziel', $ziel, PDO::PARAM_STR);
            $prepare->bindParam(':id', $id, PDO::PARAM_INT);
            $prepare->execute();

            echo 'Menüpunkt erfolgreich aktualisiert.';
            header("Location: https://codevoyage.de/acp/sidebar/left/codevoyage/index.php");
            exit();
        } else {
            echo 'Bitte füllen Sie alle Felder aus.';
        }
    } catch (PDOException $e) {
        echo 'Es liegt ein Problem vor: ' . htmlspecialchars($e->getMessage());
    }
}
?>

<?php
require_once ($_SERVER['DOCUMENT_ROOT'] . "/layout/footer/acp.full.footer.inc.php");
?>