<?php
if (!isset($page)) $page = '';
require_once ($_SERVER['DOCUMENT_ROOT'] . "/../includes/database.inc.php");
$navigation_header = "SELECT * FROM `navigation_header` ORDER BY `reihenfolge` ASC";
$ausgabe_navigation_header = $connection->query($navigation_header);
$navigation_header_liste = $ausgabe_navigation_header->fetchAll(PDO::FETCH_ASSOC);
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