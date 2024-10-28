<?php
    $bereich = 'Administrationsbereich';
    $pageTitle = 'Snippet hinzufügen';
    require_once ($_SERVER['DOCUMENT_ROOT'] . "/layout/header/core.header.inc.php");
?>

<form action="add.php" method="post">
<label for="kategorie">Kategorie:</label>
    <select name="kategorie_id" id="kategorie" class="wissensportal-kategorien" required>
    <?php
    // Abfrage der Kategorien aus der Datenbank
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

    <label for="php_snippet_alternativ">PHP Snippet (Alternative Syntax):</label>
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
    require_once ($_SERVER['DOCUMENT_ROOT'] . "/layout/footer/acp.footer.inc.php");
?>