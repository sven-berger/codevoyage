<?php
    $bereich = 'Administrationsbereich';
    $pageTitle = "PHP-Sidebar";
    require_once ($_SERVER['DOCUMENT_ROOT'] . "/acp/includes/header.inc.php");

$sql = "
CREATE TABLE IF NOT EXISTS `php_sidebar_left`
(
`ID` INT NOT NULL AUTO_INCREMENT,
`url` TEXT NOT NULL,
`ziel` VARCHAR(255) NOT NULL,
PRIMARY KEY (`ID`)
)";

try {
    $connection->exec($sql);
} catch (PDOException $e) {
    echo 'Fehler beim Erstellen der Tabelle: ' . $e->getMessage();
    exit();
}
?>

<form action="save.php" method="post">
    <label for="url">Url:</label>
    <input type="url" name="url" required><br>

    <label for="ziel">Ziel:</label>
    <input type="ziel" name="ziel" required><br>

    <input type="submit" value="Einfügen">
</form>

<?php
    require_once ($_SERVER['DOCUMENT_ROOT'] . "/acp/includes/footer.inc.php");
?>