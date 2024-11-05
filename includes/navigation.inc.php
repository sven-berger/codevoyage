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