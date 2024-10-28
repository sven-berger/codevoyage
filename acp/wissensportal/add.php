<?php
$bereich = 'Administrationsbereich';
$pageTitle = 'Snippet hinzufügen';
require_once ($_SERVER['DOCUMENT_ROOT'] . "/layout/header/core.header.inc.php");
?>

<form action="save.php" method="post">
    <label for="kategorie">Kategorie:</label>
    <select name="kategorie_id" id="kategorie" class="wissensportal-kategorien" required>
    <?php
    $kategorien = $connection->query("SELECT id, name FROM wissensportal_kategorien")->fetchAll(PDO::FETCH_ASSOC);
    foreach ($kategorien as $kategorie) {
        echo "<option value='{$kategorie['id']}'>" . htmlspecialchars($kategorie['name']) . "</option>";
    }
    ?>
    </select>

    <label for="title">Titel:</label>
    <input type="text" name="title" required><br>

    <label for="url">URL:</label>
    <input type="text" name="url" required><br>

    <label for="description">Beschreibung:</label>
    <textarea name="description"></textarea><br>

    <label for="php_snippet">PHP Snippet:</label>
    <textarea name="php_snippet"></textarea><br>

    <label for="php_snippet">PHP Snippet (Alternative Syntax):</label>
    <textarea name="php_snippet_alternativ"></textarea><br>

    <label for="python_snippet">Python Snippet:</label>
    <textarea name="python_snippet"></textarea><br>

    <label for="javascript_snippet">JavaScript Snippet:</label>
    <textarea name="javascript_snippet"></textarea><br>

    <label for="mitteilung_snippet">Mitteilung:</label>
    <textarea name="mitteilung_snippet"></textarea>

    <input type="submit" value="Speichern">
</form>

<?php
    require_once ($_SERVER['DOCUMENT_ROOT'] . "/layout/footer/acp.full.footer.inc.php");
?>