<?php
    $bereich = 'Administrationsbereich';
    $pageTitle = 'Snippet hinzufügen';
    require_once ($_SERVER['DOCUMENT_ROOT'] . "/acp/includes/header.inc.php");
?>

<form action="save.php" method="post">
    <label for="title">Titel:</label>
    <input type="text" name="title" required><br>

    <label for="url">URL:</label>
    <input type="text" name="url" required><br>

    <label for="description">Beschreibung:</label>
    <textarea name="description"></textarea><br>

    <label for="php_snippet">PHP Snippet:</label>
    <textarea name="php_snippet"></textarea><br>

    <label for="python_snippet">Python Snippet:</label>
    <textarea name="python_snippet"></textarea><br>

    <label for="javascript_snippet">JavaScript Snippet:</label>
    <textarea name="javascript_snippet"></textarea><br>

    <input type="submit" value="Speichern">
</form>

<?php
    require_once ($_SERVER['DOCUMENT_ROOT'] . "/acp/includes/footer.inc.php");
?>