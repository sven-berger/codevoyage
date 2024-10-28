<?php
    $bereich = 'Administrationsbereich';
    $pageTitle = 'Snippet hinzufügen';
    require_once ($_SERVER['DOCUMENT_ROOT'] . "/layout/header/core.header.inc.php");
?>

<?php
// SQL-Anweisung zum Erstellen der Tabelle
$sql = "CREATE TABLE IF NOT EXISTS wissensportal (
    id INT AUTO_INCREMENT PRIMARY KEY,
    kategorie VARCHAR(255) NOT NULL,
    url VARCHAR(255) NOT NULL,
    title VARCHAR(255) NOT NULL,
    description TEXT,
    php_snippet TEXT,
    php_snippet_alternativ TEXT,
    python_snippet TEXT,
    javascript_snippet TEXT,
    mitteilung_snippet TEXT
)";

// Tabelle erstellen
try {
    $connection->exec($sql);
} catch (PDOException $e) {
    echo 'Fehler beim Erstellen der Tabelle: ' . $e->getMessage();
    exit();
}

?>

<form action="save.php" method="post">
    <label for="kategorie">Kategorie:</label>
    <select name="kategorie_id" id="kategorie" class="wissensportal-kategorien">
    <?php
    $kategorien = $connection->query("SELECT id, name FROM wissensportal_kategorien")->fetchAll(PDO::FETCH_ASSOC);
    foreach ($kategorien as $kategorie) {
        echo "<option value='{$kategorie['id']}'>" . htmlspecialchars($kategorie['name']) . "</option>";
    }
    ?>
    </select>
    <label for="url">URL:</label>
    <input type="text" name="url" required>

    <label for="title">Titel:</label>
    <input type="text" name="title" required>

    <label for="description">Beschreibung:</label>
    <textarea name="description"></textarea>

    <label for="php_snippet">PHP Snippet:</label>
    <textarea name="php_snippet"></textarea>

    <label for="php_snippet">PHP Snippet (Alternative Syntax):</label>
    <textarea name="php_snippet_alternativ"></textarea>

    <label for="python_snippet">Python Snippet:</label>
    <textarea name="python_snippet"></textarea>

    <label for="javascript_snippet">JavaScript Snippet:</label>
    <textarea name="javascript_snippet"></textarea>

    <label for="mitteilung_snippet">Mitteilung:</label>
    <textarea name="mitteilung_snippet"></textarea>

    <input type="submit" value="Speichern">
</form>

<?php
    require_once ($_SERVER['DOCUMENT_ROOT'] . "/layout/footer/acp.full.footer.inc.php");
?>