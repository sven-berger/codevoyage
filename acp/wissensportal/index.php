<?php
    $bereich = 'Administrationsbereich';
    $pageTitle = 'Wissensportal';
    require_once ($_SERVER['DOCUMENT_ROOT'] . "/acp/includes/header.inc.php");
    try {
        $sql = "SELECT * FROM wissensportal ORDER BY id DESC";
        $stmt = $connection->query($sql);
        $snippets = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "Fehler beim Laden der Snippets: " . htmlspecialchars($e->getMessage());
        exit;
    }
?>

<table>
    <thead>
        <tr>
            <th>Titel</th>
            <th>Beschreibung</th>
            <th>Aktionen</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($snippets as $snippet): ?>
            <tr>
                <td><?php echo htmlspecialchars($snippet['title']); ?></td>
                <td><?php echo htmlspecialchars($snippet['description']); ?></td>
                <td>
                    <a href="edit.php?id=<?php echo $snippet['id']; ?>">Bearbeiten</a> |
                    <a href="delete.php?id=<?php echo $snippet['id']; ?>" onclick="return confirm('Sicher, dass du dieses Snippet löschen willst?');">Löschen</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>


<?php
require_once ($_SERVER['DOCUMENT_ROOT'] . "/acp/includes/footer.inc.php");
?>