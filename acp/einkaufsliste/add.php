<?php
    $bereich = 'Administrationsbereich';
    $pageTitle = "Einkauf hinzufügen";
    require_once ($_SERVER['DOCUMENT_ROOT'] . "/layout/header/header.inc.php");

$sql = "
CREATE TABLE IF NOT EXISTS `einkaufsliste` (
`ID` INT NOT NULL AUTO_INCREMENT,
`produktname` VARCHAR(255) NOT NULL,
`menge` FLOAT NOT NULL,
`einheit` VARCHAR(255) NOT NULL,
`preis` FLOAT NOT NULL,
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
    <label for="produktname">Produktname:</label>
    <input type="text" name="produktname" required><br>

    <label for="menge">Menge:</label>
    <input type="number" step="1" id="menge" name="menge" required>

    <label for="Einheit">Einheit:</label>
    <select name="einheit" id="einheit" class="global-kategorien" required>
    <?php
    $einheit = $connection->query("SELECT * FROM einkaufsliste_einheiten ORDER BY id")->fetchAll(PDO::FETCH_ASSOC);
    foreach ($einheit as $einheiten) {
        echo "<option value='{$einheiten['id']}'>" . htmlspecialchars($einheiten['einheit']) . " (" . htmlspecialchars($einheiten['abkuerzung']). ")"; "</option>";
    }    
    ?>
    </select>

    <label for="preis">Preis:</label>
    <br><input type="number" step="0.01" id="preis" name="preis" required>

    <button type="submit">Hinzufügen</button>
    <button type="reset">Zurücksetzen</button>
</form>
<?php echo $section_ende; ?>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        if (!empty($_POST['produktname']) && !empty($_POST['menge']) && !empty($_POST['einheit'])  && !empty($_POST['preis'])) {
            $produktname = filter_input(INPUT_POST, 'produktname', FILTER_SANITIZE_SPECIAL_CHARS);
            $menge = filter_input(INPUT_POST, 'menge', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
            $einheit = filter_input(INPUT_POST, 'einheit', FILTER_SANITIZE_SPECIAL_CHARS);
            $preis = filter_input(INPUT_POST, 'preis', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);

            $prepare = $connection->prepare('INSERT INTO `einkaufsliste` (`produktname`, `menge`, `einheit`, `preis`) VALUES (:produktname, :menge, :einheit, :preis)');
            $prepare->bindParam(':produktname', $produktname, PDO::PARAM_STR);
            $prepare->bindParam(':menge', $menge, PDO::PARAM_STR);
            $prepare->bindParam(':einheit', $einheit, PDO::PARAM_STR);
            $prepare->bindParam(':preis', $preis, PDO::PARAM_STR);
            $prepare->execute();

            header("Location: https://codevoyage.de/acp/einkaufsliste/index.php");
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