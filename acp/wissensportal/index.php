<?php
    $bereich = 'Administrationsbereich';
    $pageTitle = 'Wissensportal';
    require_once ($_SERVER['DOCUMENT_ROOT'] . "/layout/header/app.header.inc.php");

    try {
        $variablen_sql = "SELECT * FROM wissensportal WHERE kategorie_id = 1 ";
        $stmt = $connection->query($variablen_sql);
        $variablen_snippets = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $arrays_sql = "SELECT * FROM wissensportal WHERE kategorie_id = 2 ORDER BY id DESC";
        $stmt = $connection->query($arrays_sql);
        $arrays_snippets = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Alle Snippets abrufen
        $sql = "SELECT * FROM wissensportal ORDER BY id DESC";
        $stmt = $connection->query($sql);
        $snippets = $stmt->fetchAll(PDO::FETCH_ASSOC);

    } catch (PDOException $e) {
        echo "Fehler beim Laden der Snippets: " . htmlspecialchars($e->getMessage());
        exit;
    }
?>

<h3 class="section-title">Variablen</h3>
<section class="section">
    <div class="sectionContent">
<table>
    <thead>
        <tr>
            <th>Titel</th>
            <th>Beschreibung</th>
            <th>Aktionen</th>
        </tr>
    </thead>
    <tbody>
            <?php foreach ($variablen_snippets as $snippet): ?>
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
</div>
</section>

<h3 class="section-title">Arrays / Listen</h3>
<section class="section">
    <div class="sectionContent">
<table>
    <thead>
        <tr>
            <th>Titel</th>
            <th>Beschreibung</th>
            <th>Aktionen</th>
        </tr>
    </thead>
    <tbody>
            <?php foreach ($arrays_snippets as $snippet): ?>
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
</div>
</section>

<?php
    require_once ($_SERVER['DOCUMENT_ROOT'] . "/layout/footer/acp.footer.inc.php");
?>
