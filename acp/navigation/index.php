<?php
$bereich = 'Administrationsbereich';
$pageTitle = "Navigationspunkt hinzufügen";
require_once ($_SERVER['DOCUMENT_ROOT'] . "/layout/header/core.header.inc.php");

$sql = "
CREATE TABLE IF NOT EXISTS `navigation`
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

<?php echo $section_beginn; ?>
<form action="" method="post">
    <label for="url">URL:</label>
    <input type="url" name="url" required><br>

    <label for="ziel">Ziel:</label>
    <input type="ziel" name="ziel" required><br>

    <input type="submit" value="Einfügen">
</form>
<?php echo $section_ende; ?>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        if (!empty($_POST['url']) && !empty($_POST['ziel'])) {
            $url = filter_input(INPUT_POST, 'url', FILTER_SANITIZE_SPECIAL_CHARS);
            $ziel = filter_input(INPUT_POST, 'ziel', FILTER_SANITIZE_SPECIAL_CHARS);

            $prepare = $connection->prepare('INSERT INTO `navigation` (`url`, `ziel`) VALUES (:url, :ziel)');
            $prepare->bindParam(':url', $url, PDO::PARAM_STR);
            $prepare->bindParam(':ziel', $ziel, PDO::PARAM_STR);
            $prepare->execute();

            echo 'Menüpunkt erfolgreich eingetragen.';
            header("Location: https://codevoyage.de/acp/navigation/index.php");
            exit();
        } else {
            echo 'Bitte füllen Sie alle Felder aus.';
        }
    } catch (PDOException $e) {
        echo 'Es liegt ein Problem vor: ' . htmlspecialchars($e->getMessage());
    }
}
?>

<?php echo $section_beginn; ?>   
        <?php try { ?>
            <?php if (!empty($navigation)) : ?>
                <table>
                    <tr>
                        <th>URL</th>
                        <th>Ziel</th>
                        <th>Aktion</th>
                    </tr>
                    <?php foreach ($navigation as $row) : ?>
                        <tr>
                            <td><?php echo htmlspecialchars($row['url']); ?></td>
                            <td><?php echo htmlspecialchars($row['ziel']); ?></td>
                            <td>
                                <a href="https://codevoyage.de/acp/sidebar/left/acp/navigation/edit.php?id=<?php echo htmlspecialchars($row['ID']); ?>">Bearbeiten</a> |
                                <a href="https://codevoyage.de/acp/sidebar/left/acp/navigation/delete.php?id=<?php echo htmlspecialchars($row['ID']); ?>" onclick="return confirm('Bist du dir sicher, dass du diesen Eintrag löschen möchtest?');">Löschen</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>
           <?php else : ?>
                <p style="text-align: center;">Keine Einträge gefunden.</p>
            <?php endif; ?>
        <?php } catch (PDOException $e) { ?>
            <p style="text-align: center;">Es liegt ein Problem vor: <?php echo htmlspecialchars($e->getMessage()); ?></p>
        <?php } ?>
<?php echo $section_ende; ?>


<?php
    require_once ($_SERVER['DOCUMENT_ROOT'] . "/layout/footer/acp.footer.inc.php");
?>