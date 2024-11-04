<?php
    $bereich = 'Administrationsbereich';
    $pageTitle = "Sonstiges hinzufügen (Sonstiges)";
    require_once ($_SERVER['DOCUMENT_ROOT'] . "/layout/header/core.header.inc.php");

$sql = "
CREATE TABLE IF NOT EXISTS `php_sidebar_left_sonstiges`
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
    <label for="url">URL:</label>
    <input type="url" name="url" required><br>

    <label for="ziel">Ziel:</label>
    <input type="ziel" name="ziel" required><br>

    <input type="submit" value="Einfügen">
</form>

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        if (!empty($_POST['url']) && !empty($_POST['ziel'])) {
            $url = filter_input(INPUT_POST, 'url', FILTER_SANITIZE_SPECIAL_CHARS);
            $ziel = filter_input(INPUT_POST, 'ziel', FILTER_SANITIZE_SPECIAL_CHARS);

            $prepare = $connection->prepare('INSERT INTO `php_sidebar_left_sonstiges` (`url`, `ziel`) VALUES (:url, :ziel)');
            $prepare->bindParam(':url', $url, PDO::PARAM_STR);
            $prepare->bindParam(':ziel', $ziel, PDO::PARAM_STR);
            $prepare->execute();

            echo 'Menüpunkt erfolgreich eingetragen.';
            header("Location: https://codevoyage.de/acp/sidebar/left/php/index.php");
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