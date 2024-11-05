<?php
    $bereich = 'Mein Blog';
    $pageTitle = 'Blog von CodeVoyage.de';
    require_once ($_SERVER['DOCUMENT_ROOT'] . "/layout/header/header.inc.php");
?>


<?php
$sql = "
CREATE TABLE IF NOT EXISTS `blog` 
(
`ID` INT NOT NULL AUTO_INCREMENT,
`ueberschrift` VARCHAR(255) NOT NULL,
`kurzbeschreibung` VARCHAR(255) NOT NULL,
`inhalt` TEXT NOT NULL,
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

<?php echo $section_beginn; ?>
<form action="" method="post">
    <label for="ueberschrift">Überschrift:</label>
    <input type="ueberschrift" name="ueberschrift" required><br>

    <label for="kurzbeschreibung">Kurzbeschreibung:</label>
    <input type="kurzbeschreibung" name="kurzbeschreibung" required><br>

    <label for="inhalt">Inhalt:</label>
    <input type="inhalt" name="inhalt" required><br>

    <input type="submit" value="Speichern">
</form>
<?php echo $section_ende; ?>

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        if (!empty($_POST['ueberschrift']) && !empty($_POST['kurzbeschreibung']) && !empty($_POST['inhalt'])) {
            $ueberschrift = filter_input(INPUT_POST, 'ueberschrift', FILTER_SANITIZE_SPECIAL_CHARS);
            $kurzbeschreibung = filter_input(INPUT_POST, 'kurzbeschreibung', FILTER_SANITIZE_SPECIAL_CHARS);
            $inhalt = filter_input(INPUT_POST, 'inhalt', FILTER_SANITIZE_SPECIAL_CHARS);

            $prepare = $connection->prepare('INSERT INTO `blog` (`ueberschrift`, `kurzbeschreibung`, `inhalt`) VALUES (:ueberschrift, :kurzbeschreibung, :inhalt)');
            $prepare->bindParam(':ueberschrift', $ueberschrift, PDO::PARAM_STR);
            $prepare->bindParam(':kurzbeschreibung', $kurzbeschreibung, PDO::PARAM_STR);
            $prepare->bindParam(':inhalt', $inhalt, PDO::PARAM_STR);
            $prepare->execute();

            header("Location: https://codevoyage.de/acp/blog/index.php");
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
    require_once ($_SERVER['DOCUMENT_ROOT'] . "/layout/footer/acp.footer.inc.php");
?>


