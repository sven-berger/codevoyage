<?php
    $bereich = 'Administrationsbereich';
    $pageTitle = 'Kategorien (Wissensportal)';
    require_once ($_SERVER['DOCUMENT_ROOT'] . "/layout/header/core.header.inc.php");
    try {
        $sql = "SELECT * FROM wissensportal_kategorien ORDER BY id DESC";
        $stmt = $connection->query($sql);
        $wissensportal_kategorien = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "Fehler beim Laden der Snippets: " . htmlspecialchars($e->getMessage());
        exit;
    }
?>

<div class="ActionArea">
    <ul>
        <li><button class="button-action"><a href="https://codevoyage.de/acp/sidebar/left/acp/seitenleiste/add.php">Menüpunkt hinzufügen</a></button></li>
    </ul>
</div>     
<table>
    <thead>
        <tr>
            <th>Name</th>
            <th>Aktionen</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($wissensportal_kategorien as $kategorie): ?>
            <tr>
                <td><?php echo htmlspecialchars($kategorie['name']); ?></td>
                <td>
                    <a href="edit.php?id=<?php echo $kategorie['id']; ?>">Bearbeiten</a> |
                    <a href="delete.php?id=<?php echo $kategorie['id']; ?>" onclick="return confirm('Sicher, dass du dieses Snippet löschen willst?');">Löschen</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>


<?php
    require_once ($_SERVER['DOCUMENT_ROOT'] . "/layout/footer/acp.full.footer.inc.php");
?>