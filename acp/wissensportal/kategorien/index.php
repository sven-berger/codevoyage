<?php
    $bereich = 'Administrationsbereich';
    $pageTitle = 'Kategorien (Wissensportal)';
    require_once ($_SERVER['DOCUMENT_ROOT'] . "/layout/header/core.header.inc.php");
    try {
        $sql = "SELECT * FROM wissensportal_kategorien";
        $stmt = $connection->query($sql);
        $wissensportal_kategorien = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "Fehler beim Laden der Kategorien: " . htmlspecialchars($e->getMessage());
        exit;
    }
?>

<div class="ActionArea">
    <ul>
        <li><button class="button-action"><a href="https://codevoyage.de/acp/wissensportal/kategorien/add.php">Kategorie hinzufügen</a></button></li>
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
                <a href="https://codevoyage.de/acp/wissensportal/kategorien/edit.php?id=<?php echo htmlspecialchars($kategorie['id']); ?>">Bearbeiten</a> |
                <a href="https://codevoyage.de/acp/wissensportal/kategorien/delete.php?id=<?php echo htmlspecialchars($kategorie['id']); ?>" onclick="return confirm('Sicher, dass du diese Kategorie löschen willst?');">Löschen</a>
            </td>
        </tr>
    <?php endforeach; ?>
</tbody>
</table>


<?php
    require_once ($_SERVER['DOCUMENT_ROOT'] . "/layout/footer/acp.full.footer.inc.php");
?>