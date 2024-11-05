<?php
    $bereich = 'Administrationsbereich';
    $pageTitle = "Eintrittspreise";
    require_once ($_SERVER['DOCUMENT_ROOT'] . "/layout/header/header.inc.php");
?>

<?php echo $section_beginn; ?>
<form action="index.php" method="post">
    <div>
        <label for="alter_von">Von:</label>
        <input type="number" id="alter_von" name="alter_von" required>
    </div>
    <div>
        <label for="alter_bis">Bis:</label>
        <input type="number" id="alter_bis" name="alter_bis" required>
    </div>
    <div>
        <label for="preis">Preis:</label>
        <input type="number" step="0.01" id="preis" name="preis" required>
    </div>
    <div>
        <button type="submit">Hinzufügen</button>
        <button type="reset">Zurücksetzen</button>
    </div>
</form>
<?php echo $section_ende; ?>

<?php

$sql = "
CREATE TABLE IF NOT EXISTS `eintrittspreise` (
    `ID` INT NOT NULL AUTO_INCREMENT,
    `alter_von` INT NOT NULL,
    `alter_bis` INT NOT NULL,
    `preis` DECIMAL(10, 2) NOT NULL,
    PRIMARY KEY (`ID`)
)";

try {
    $connection->exec($sql);
} catch (PDOException $e) {
    echo 'Fehler beim Erstellen der Tabelle: ' . $e->getMessage();
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        if (isset($_POST['alter_von']) && !empty($_POST['alter_bis']) && !empty($_POST['preis'])) {
            $alter_von = filter_input(INPUT_POST, 'alter_von', FILTER_SANITIZE_NUMBER_INT);
            $alter_bis = filter_input(INPUT_POST, 'alter_bis', FILTER_SANITIZE_NUMBER_INT);
            $preis = filter_input(INPUT_POST, 'preis', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);

            $prepare = $connection->prepare('INSERT INTO `eintrittspreise` (`alter_von`, `alter_bis`, `preis`) VALUES (:alter_von, :alter_bis, :preis)');
            $prepare->bindParam(':alter_von', $alter_von, PDO::PARAM_INT);
            $prepare->bindParam(':alter_bis', $alter_bis, PDO::PARAM_INT);
            $prepare->bindParam(':preis', $preis, PDO::PARAM_STR);
            $prepare->execute();

            header("Location: https://codevoyage.de/acp/eintrittspreise/index.php");
            exit();
        } else {
            echo 'Bitte füllen Sie alle Felder aus.';
        }
    } catch (PDOException $e) {
        echo 'Es liegt ein Problem vor: ' . $e->getMessage();
        echo "<pre>";
        var_dump($e->getMessage());
        echo "</pre>";
    }
}

?>

<?php
try {
    $sql = "SELECT * FROM `eintrittspreise`";
    $result = $connection->query($sql);
?>
    <?php if ($result->rowCount() > 0): ?>
        <?php echo $section_beginn; ?>
        <table>
        <tr>
            <th>Von</th>
            <th>Bis</th>
            <th>Preis</th>
            <th>Aktion</th>
        </tr>

        <?php $rows = $result->fetchAll(PDO::FETCH_ASSOC); ?>
        <?php foreach ($rows as $row): ?>
            <tr>
                <td><?php echo htmlspecialchars($row['alter_von']); ?></td>
                <td><?php echo htmlspecialchars($row['alter_bis']); ?></td>
                <td><?php echo htmlspecialchars($row['preis']); ?> €</td>
                <td>
                    <a href='edit.php?id=<?php echo htmlspecialchars($row['ID']); ?>'>Bearbeiten</a> |
                    <a href='delete.php?id=<?php echo htmlspecialchars($row['ID']); ?> onclick='return confirm("Bist du dir sicher, dass du diesen Eintrag löschen möchtest?")>Löschen</a>
                </td>
            </tr>
        <?php endforeach; ?>
        </table>
        <?php echo $section_ende; ?>
    <?php else: ?>
        <p style='text-align: center;'>Keine Eintrittspreise gefunden.</p>
    <?php endif; ?>
<?php } catch (PDOException $e) {
    echo '<p style="text-align: center;">Es liegt ein Problem vor: ' . $e->getMessage() . '</p>';
}
?>

<?php
    require_once ($_SERVER['DOCUMENT_ROOT'] . "/layout/footer/acp.footer.inc.php");
?>