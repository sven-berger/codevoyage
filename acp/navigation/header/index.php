<?php
$bereich = 'Administrationsbereich';
$pageTitle = "Navigationspunkt hinzufügen";
require_once ($_SERVER['DOCUMENT_ROOT'] . "/layout/header/app.header.inc.php");

// Tabelle erstellen, falls sie nicht existiert
$sql = "
CREATE TABLE IF NOT EXISTS `navigation_header`
(
`ID` INT NOT NULL AUTO_INCREMENT,
`reihenfolge` INT NOT NULL,
`url` TEXT NOT NULL,
`ziel` VARCHAR(255) NOT NULL,
PRIMARY KEY (`ID`)
)";
try {
    $connection->exec($sql);

    // Sortiere die Navigationseinträge nach der Spalte `reihenfolge` aufsteigend
    $sql = "SELECT * FROM `navigation_header` ORDER BY `reihenfolge` ASC";
    $navigation_header_liste = $connection->query($sql)->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo '<p style="text-align: center;">Es liegt ein Problem vor: ' . htmlspecialchars($e->getMessage()) . '</p>';
}
?>

<?php echo $section_beginn; ?>
<form action="" method="post">
    <label for="reihenfolge">Reihenfolge:</label>
    <input type="text" name="reihenfolge" required><br>

    <label for="url">URL:</label>
    <input type="url" name="url" required><br>

    <label for="ziel">Ziel:</label>
    <input type="text" name="ziel" required><br>

    <input type="submit" value="Einfügen">
</form>
<?php echo $section_ende; ?>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        if (!empty($_POST['url']) && !empty($_POST['ziel']) && !empty($_POST['reihenfolge'])) {
            $url = filter_input(INPUT_POST, 'url', FILTER_SANITIZE_SPECIAL_CHARS);
            $ziel = filter_input(INPUT_POST, 'ziel', FILTER_SANITIZE_SPECIAL_CHARS);
            $reihenfolge = filter_input(INPUT_POST, 'reihenfolge', FILTER_SANITIZE_NUMBER_INT);

            $prepare = $connection->prepare('INSERT INTO `navigation_header` (`reihenfolge`, `url`, `ziel`) VALUES (:reihenfolge, :url, :ziel)');
            $prepare->bindParam(':reihenfolge', $reihenfolge, PDO::PARAM_INT);
            $prepare->bindParam(':url', $url, PDO::PARAM_STR);
            $prepare->bindParam(':ziel', $ziel, PDO::PARAM_STR);
            $prepare->execute();

            echo 'Menüpunkt erfolgreich eingetragen.';
            header("Location: https://codevoyage.de/acp/navigation/header/index.php");
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
    <?php if (!empty($navigation_header_liste)) : ?>
        <table>
            <tr>   
                <th>Reihenfolge</th>
                <th>URL</th>
                <th>Ziel</th>
                <th>Aktion</th>
            </tr>
            <?php foreach ($navigation_header_liste as $row) : ?>
                <tr>
                    <td><?php echo htmlspecialchars($row['reihenfolge']); ?></td>
                    <td><?php echo htmlspecialchars($row['url']); ?></td>
                    <td><?php echo htmlspecialchars($row['ziel']); ?></td>
                    <td>
                        <a href="https://codevoyage.de/acp/navigation/header/edit.php?id=<?php echo htmlspecialchars($row['ID']); ?>">Bearbeiten</a> |
                        <a href="https://codevoyage.de/acp/navigation/header/delete.php?id=<?php echo htmlspecialchars($row['ID']); ?>" onclick="return confirm('Bist du dir sicher, dass du diesen Eintrag löschen möchtest?');">Löschen</a>
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