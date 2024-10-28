<?php
    $bereich = 'Administrationsbereich';
    $pageTitle = 'Kategorie hinzufügen (Wissensportal)';
    require_once ($_SERVER['DOCUMENT_ROOT'] . "/layout/header/core.header.inc.php");
?>

<form action="save.php" method="post">
    <label for="title">Name:</label>
    <input type="name" name="name" required>

    <input type="submit" value="Speichern">
</form>

<?php
    require_once ($_SERVER['DOCUMENT_ROOT'] . "/layout/footer/acp.full.footer.inc.php");
?>