<?php
    $bereich = 'Administrationsbereich';
    $pageTitle = "Eintrittspreise";
    require_once ($_SERVER['DOCUMENT_ROOT'] . "/acp/includes/header.inc.php");
?>

<?php 
try {
    if (!empty($eigene_werke_liste)): ?>
        <table>
            <tr>
                <th>URL</th>
                <th>Ziel</th>
                <th>Aktion</th>
            </tr>
            <?php foreach ($eigene_werke_liste as $row): ?>
                <tr>
                    <td><?php echo htmlspecialchars($row['url']); ?></td>
                    <td><?php echo htmlspecialchars($row['ziel']); ?></td>
                    <td>
                        <a href="edit.php?id=<?php echo htmlspecialchars($row['ID']); ?>">Bearbeiten</a> | 
                        <a href="delete.php?id=<?php echo htmlspecialchars($row['ID']); ?>" onclick="return confirm('Bist du dir sicher, dass du diesen Eintrag löschen möchtest?');">Löschen</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php else: ?>
        <p style="text-align: center;">Keine Einträge gefunden.</p>
    <?php endif;
} catch (PDOException $e) {
    echo '<p style="text-align: center;">Es liegt ein Problem vor: ' . htmlspecialchars($e->getMessage()) . '</p>';
}
?>


<?php
    require_once ($_SERVER['DOCUMENT_ROOT'] . "/acp/includes/footer.inc.php");
?>