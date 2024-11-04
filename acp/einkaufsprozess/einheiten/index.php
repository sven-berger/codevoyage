<?php
    $bereich = 'Administrationsbereich';
    $pageTitle = 'Einheiten (Einkaufsprozess)';
    require_once ($_SERVER['DOCUMENT_ROOT'] . "/layout/header/app.header.inc.php");
    try {
        $sql = "SELECT * FROM einkaufsprozess_einheiten";
        $stmt = $connection->query($sql);
        $einkaufsprozess_einheiten= $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "Fehler beim Laden der Kategorien: " . htmlspecialchars($e->getMessage());
        exit;
    }
?>


<?php echo $section_beginn; ?>
<form action="" method="post">
    <label for="Einheit">Einheit:</label>
    <input type="text" name="einheit" required><br>

    <label for="Abkürzung">Abkürzung:</label>
    <input type="text" name="abkuerzung" required><br>

    <button type="submit">Hinzufügen</button>
    <button type="reset">Zurücksetzen</button>
</form>
<?php echo $section_ende; ?>

<?php

$sql = "
CREATE TABLE IF NOT EXISTS `einkaufsprozess_einheiten`
(
    `id` INT NOT NULL AUTO_INCREMENT,
    `einheit` VARCHAR(255) NOT NULL,
    `abkuerzung` VARCHAR(255) NOT NULL,
    PRIMARY KEY (`id`)
)";

try {
    $connection->exec($sql);
} catch (PDOException $e) {
    echo 'Fehler beim Erstellen der Tabelle: ' . $e->getMessage();
    exit();
}

if (!empty($_POST['einheit']) && !empty($_POST['abkuerzung'])) {
    $einheit = $_POST['einheit'];
    $abkuerzung = $_POST['abkuerzung'];
    $prepare = $connection->prepare('INSERT INTO `einkaufsprozess_einheiten` (`einheit`, `abkuerzung`) VALUES (:einheit, :abkuerzung)');
    $prepare->bindParam(':einheit', $einheit, PDO::PARAM_STR);
    $prepare->bindParam(':abkuerzung', $abkuerzung, PDO::PARAM_STR);
    $prepare->execute();
    header("Location: https://codevoyage.de/acp/einkaufsprozess/einheiten/index.php");
    exit;
}

?>

<?php echo $section_beginn; ?>    
<table>
    <thead>
        <tr>
            <th>Einheit</th>
            <th>Abkürzung</th>
            <th>Aktionen</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($einkaufsprozess_einheiten as $einheiten): ?>
    <tr>
        <td><?php echo htmlspecialchars($einheiten['einheit']); ?></td>
        <td><?php echo htmlspecialchars($einheiten['abkuerzung']); ?></td>
        <td>
            <a href="https://codevoyage.de/acp/einkaufsprozess/einheiten/edit.php?id=<?php echo htmlspecialchars($einheiten['id']); ?>">Bearbeiten</a> |
            <a href="https://codevoyage.de/acp/einkaufsprozess/einheiten/delete.php?id=<?php echo htmlspecialchars($einheiten['id']); ?>" onclick="return confirm('Sicher, dass du diese Kategorie löschen willst?');">Löschen</a>
        </td>
    </tr>
<?php endforeach; ?>
</tbody>
</table>
<?php echo $section_ende; ?>

<?php
    require_once ($_SERVER['DOCUMENT_ROOT'] . "/layout/footer/acp.footer.inc.php");
?>