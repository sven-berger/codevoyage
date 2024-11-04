<?php
try {
    $navigation_header = "SELECT * FROM `navigation_header` ORDER BY `reihenfolge` ASC";
    $ausgabe_navigation_header = $connection->query($navigation_header);
    $navigation_header_liste = $ausgabe_navigation_header->fetchAll(PDO::FETCH_ASSOC);
    if (!isset($page)) $page = '';
} catch (PDOException $e) {
    echo "<p style='color:red;'>Fehler bei der Abfrage: " . htmlspecialchars($e->getMessage()) . "</p>";
}
?>

<div class="navigation">
    <?php if (!empty($navigation_header_liste)): ?>
        <?php foreach ($navigation_header_liste as $row): ?>
            <a href="<?php echo htmlspecialchars($row['url']); ?>" 
               <?php if ($bereich === $row['ziel']): ?> class="active"<?php endif; ?>>
               <?php echo htmlspecialchars($row['ziel']); ?>
            </a>
        <?php endforeach; ?>
    <?php else: ?>
        <p>Keine Einträge gefunden.</p>
    <?php endif; ?>
</div>