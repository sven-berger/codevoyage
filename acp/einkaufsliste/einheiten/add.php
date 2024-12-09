<?php
    $bereich = 'Administrationsbereich';
    $pageTitle = 'Einheit hinzufügen';
    require_once ($_SERVER['DOCUMENT_ROOT'] . "/layout/header/header.inc.php");
?>

<?php
$sql = "
CREATE TABLE IF NOT EXISTS `einkaufsliste_einheiten`
(
    `id` INT NOT NULL AUTO_INCREMENT,
    `einheit` VARCHAR(255) NOT NULL,
    `abkuerzung` VARCHAR(255) NOT NULL
    PRIMARY KEY (`id`)
)";

try {
    $connection->exec($sql);
} catch (PDOException $e) {
    echo 'Fehler beim Erstellen der Tabelle: ' . $e->getMessage();
    exit();
}

?>

<?php echo $section_beginn; ?>
<form action="" method="post">
    <label for="title">Einheit:</label>
    <input type="text" name="einheit" required>
    <label for="title">Abkürzung:</label>
    <input type="text" name="abkuerzung" min="1" max="3" required>

    <input type="submit" value="Speichern">
    <input type="reset" value="Zurücksetzen">
</form>
<?php echo $section_ende; ?>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        if (!empty($_POST['einheit']) && !empty($_POST['abkuerzung'])) {
            $produktname = filter_input(INPUT_POST, 'einheit', FILTER_SANITIZE_SPECIAL_CHARS);
            $einheit = filter_input(INPUT_POST, 'abkuerzung', FILTER_SANITIZE_SPECIAL_CHARS);

            $prepare = $connection->prepare('INSERT INTO `einkaufsliste_einheiten` (`einheit`, `abkuerzung`) VALUES (:einheit, :abkuerzung)');
            $prepare->bindParam(':einheit', $einheit, PDO::PARAM_STR);
            $prepare->bindParam(':abkuerzung', $abkuerzung, PDO::PARAM_STR);
            $prepare->execute();

            header("Location: https://codevoyage.de/acp/einkaufsliste/einheiten/index.php");
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