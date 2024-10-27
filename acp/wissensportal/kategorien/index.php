<?php
    $bereich = 'Administrationsbereich';
    $pageTitle = 'Kategorien (Wissensportal)';
    require_once ($_SERVER['DOCUMENT_ROOT'] . "/layout/header/core.header.inc.php");

    try {
        // Kategorien laden
        $sql = "SELECT * FROM wissensportal_kategorien ORDER BY id DESC";
        $stmt = $connection->query($sql);
        $wissensportal_kategorien = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Snippets aus der Kategorie "Variablen" (ID: 1) abrufen
        $sql = "SELECT * FROM wissensportal WHERE kategorie_id = 1";
        $stmt = $connection->query($sql);
        $variablen_snippets = $stmt->fetchAll(PDO::FETCH_ASSOC);

    } catch (PDOException $e) {
        echo "Fehler beim Laden der Daten: " . htmlspecialchars($e->getMessage());
        exit;
    }
?>

<section class="section">
    <div class="sectionContent">
        <h2>Kategorie: Variablen (ID: 1)</h2>
        <ul>
            <?php if (!empty($variablen_snippets)): ?>
                <?php foreach ($variablen_snippets as $snippet): ?>
                    <li>
                        <strong><?php echo htmlspecialchars($snippet['title']); ?></strong><br>
                        <?php echo htmlspecialchars($snippet['description']); ?><br>
                        <a href="snippet_detail.php?id=<?php echo $snippet['id']; ?>">Mehr anzeigen</a>
                    </li>
                <?php endforeach; ?>
            <?php else: ?>
                <li>Keine Snippets in dieser Kategorie vorhanden.</li>
            <?php endif; ?>
        </ul>
    </div>
</section>

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
                    <a href="edit.php?id=<?php echo $kategorie['id']; ?>">Bearbeiten</a> |
                    <a href="delete.php?id=<?php echo $kategorie['id']; ?>" onclick="return confirm('Sicher, dass du diese Kategorie löschen willst?');">Löschen</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php
    require_once ($_SERVER['DOCUMENT_ROOT'] . "/layout/footer/acp.full.footer.inc.php");
?>