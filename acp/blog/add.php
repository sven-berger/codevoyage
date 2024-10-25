<?php
    $bereich = 'Mein Blog';
    $pageTitle = 'Blog von CodeVoyage.de';
    require_once ($_SERVER['DOCUMENT_ROOT'] . "/layout/header/index.header.inc.php");
?>


<?php
$sql = "
CREATE TABLE IF NOT EXISTS `blog` 
(
`ID` INT NOT NULL AUTO_INCREMENT,
`ueberschrift` VARCHAR(255) NOT NULL,
`kurzbeschreibung` VARCHAR(255) NOT NULL,
`inhalt` TEXT NOT NULL,
`blog` INT NOT NULL,
PRIMARY KEY (`ID`)
)
";

try {
    $connection->exec($sql);
} catch (PDOException $e) {
    echo 'Fehler beim Erstellen der Tabelle: ' . $e->getMessage();
    exit();
}
?>

<form action="save.php" method="post">
    <label for="ueberschrift">Überschrift:</label>
    <input type="text" name="ueberschrift" required><br>

    <label for="kurzbeschreibung">Kurzbeschreibung:</label>
    <input type="text" name="kurzbeschreibung" required><br>

    <label for="inhalt">Inhalt:</label>
    <textarea name="inhalt" required></textarea><br>

    <input type="submit" value="Speichern">
</form>

<?php
    require_once ($_SERVER['DOCUMENT_ROOT'] . "/layout/footer/index.footer.inc.php");
?>


